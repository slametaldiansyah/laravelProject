<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\type;

class EmailConfigController extends Controller
{
    public function index()
    {
        $types = Type::all();
        // $token = session()->get('token')['access_token'];
        // $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/auth/get-email-list');
        // $data = json_decode((string) $response->body(), true);
        // dd($data);
        return view('config.email.v_index', compact('types'));
    }

    public function show()
    {
        $token = session()->get('token')['access_token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/auth/get-email-list');
        $data = json_decode((string) $response->body(), true);
        // return response()->json(['dataPay' => $response]);
        return response()->json(['data' => $data]);
        // dd($data);
    }
}
