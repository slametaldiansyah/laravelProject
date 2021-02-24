<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Detail_user;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Validator;


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
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|between:2,100',
            // 'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'detail_user_id' => 'required',
	        // 'accessrole' => 'required|string'
        ]);
        // $validatorDetail = Validator::make($request->all(),[
        //     'fullname' => 'required|string',
        //     'name' => 'required|string',
        //     'birth_date' => 'required|date',
        //     'join_date' => 'required|date',
        //     'position_id' => 'required',
        //     'NIK' => 'required',
        //     'NPWP' => 'required',
        //     'email' => 'required|string|email|max:100|unique:detail_user'
        // ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));


        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
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
        $id_position = DB::table('position')->select('name')->where('id', '=',$id)->get();
        $role = DB::table('auth_role')->groupBy('r.name')->select('r.name as rolename')
                    ->join('users as u', 'auth_role.user_id', '=', 'u.id')
                    ->join('role as r', 'auth_role.role_id', '=', 'r.id')
                    ->where('auth_role.user_id', '=',$user_id)->get();
        $app = DB::table('auth_role')->groupBy('app.name')->select('app.name as appname')
                    ->join('users as u', 'auth_role.user_id', '=', 'u.id')
                    ->join('application as app', 'auth_role.application_id', '=', 'app.id')
                    ->where('u.id', '=',$user_id)->get();


        $user = auth()->user();
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => $user,
            // 'user' => auth()->user()->detail_user_id,
            'detail_user' => Detail_user::where('id',$id)->get(),
            'position' => $id_position,
            'role' => $role,
            'app' => $app

        ]);
    }
}
