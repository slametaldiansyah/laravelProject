<?php

namespace App\Http\Controllers;

use App\Models\AuthRole;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Detail_user;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            // 'password' => 'required|string|min:6',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $rules = [
            //user
            'username' => 'required|string|between:2,100',
            'password' => 'required|string|min:6',

            //detail_user
            'fullname' => 'required|string|between:4,100',
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'join_date' => 'required|date',
            'position_id' => 'required',
            'NIK' => 'required|integer',
            'NPWP' => 'required|string',
            'email' => 'required|string|email',

            //role
            'role_id' => 'required',
            'application_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $detail_userId = Detail_user::create([
                'fullname' => $request->fullname,
                'name' => $request->name,
                'birth_date' => $request->birth_date,
                'join_date' => $request->join_date,
                'position_id' => $request->position_id,
                'NIK' => $request->NIK,
                'NPWP' => $request->NPWP,
                'email' => $request->email,
        ])->id;
            if ($detail_userId != null) {
                $userId = User::create([
                    'username' => $request->username,
                    'detail_user_id' => $detail_userId,
                    'password' => Hash::make($request->password)
                ])->id;
                    if ($userId != null) {
                        AuthRole::create([
                            'user_id' => $userId,
                            'role_id' => $request->role_id,
                            'application_id' => $request->application_id
                        ]);
                    }else{
                        return response()->json([
                            'message' => 'Detail user data error',
                            'fullname' => $request->fullname,
                        ], 400);
                    }
            }else{
                return response()->json([
                    'message' => 'Users data error',
                    'username' => $request->username,
                ], 400);
            }
        // $user = User::create(array_merge(
        //     $validator->validated(),
        //     ['password' => bcrypt($request->password)]
        // ));

        return response()->json([
            'message' => 'User successfully registered',
            'data' => $request->all(),
        ], 201);

        // return response()->json([
        //     'message' => 'User successfully registered',
        //     'user' => $user
        // ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }
    public function getEmailList()
    {
        $email = Detail_user::select('email')->get();
        return response()->json($email);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        $user_id = auth()->user()->id;
        $id = auth()->user()->detail_user_id;
        $role = DB::table('auth_role')->groupBy('r.name')->select('r.name as rolename')
                    ->join('users as u', 'auth_role.user_id', '=', 'u.id')
                    ->join('role as r', 'auth_role.role_id', '=', 'r.id')
                    ->where('auth_role.user_id', '=',$user_id)->first();
        $app = DB::table('auth_role')->groupBy('app.name')->select('app.name as appname')
                    ->join('users as u', 'auth_role.user_id', '=', 'u.id')
                    ->join('application as app', 'auth_role.application_id', '=', 'app.id')
                    ->where('u.id', '=',$user_id)->first();
        $getDetailUser = Detail_user::with('position')
                    ->where('id', $id)->first();
        $sessionIn = [
            'id' => auth()->user()->id,
            'username' => auth()->user()->username,
            'position' => $getDetailUser->position->name,
            'fullname' => $getDetailUser->fullname,
            'name' => $getDetailUser->name,
            'birth_date' => $getDetailUser->birth_date,
            'join_date' => $getDetailUser->join_date,
            'NIK' => $getDetailUser->NIK,
            'NPWP' => $getDetailUser->NPWP,
            'email' => $getDetailUser->email,
            'role' => $role->rolename,
            'app' => $app->appname
        ];
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => $sessionIn,
            // 'sessionIn' => $sessionIn,

        ]);
    }
}
