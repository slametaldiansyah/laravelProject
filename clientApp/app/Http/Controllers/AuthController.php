<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index()
    {
       return view('auth.v_login');
    }

    public function callapiusinglaravelui(Request $request)
    {
        // Inputan yg diambil
        $credentials = $request->only('username', 'password');
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd($credentials);
        if ($credentials == true) {
            // return 'ok';
            $response = Http::post('http://127.0.0.1:8000/api/auth/login', [
                'username' => $credentials['username'],
                'password' => $credentials['password'],
            ]);
            $data = json_decode((string) $response->body(), true);
            // dd($response);
            // dd($data);
            try {
                $data['access_token'] == true;
                // dd($data);
                session()->put('token', $data);
                session()->push($data['user']['username'], $data['user']['username']);
                // dd(session()->has('token'));
                // Alert::success('Success', 'Slamat Datang');
                // $role = session()->get('token')['user']['role'];
                // return redirect()->intended('home' . $role);
                return redirect()->intended('/');
            } catch (\Throwable $th) {
                // dd($data);
                try {
                    $data['password'] == true;
                    // dd($data);
                    // $alert = "'Email or Password tidak terdaftar', 'error'";
                    return redirect('login');
                } catch (\Throwable $th) {
                    $data['error'] == true;
                    return redirect('login');
                }
                // $data['error'] == true;
                // return redirect('login');
            }
        }
        return redirect('login');
    }
    public function logout()
    {

        if (session()->has('token')) {
            session()->flush();
            // Alert::success('Success', 'Anda telah logout !!!');
            return redirect()->route('login');
        } else {
            return response('Unauthorized.', 401);
        }
    }

    public function userProfile()
    {
        return view('auth.profile-login');
    }
}
