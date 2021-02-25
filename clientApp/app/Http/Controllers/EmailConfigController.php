<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPSTORM_META\type;

class EmailConfigController extends Controller
{
    public function index()
    {
        return view('config.email.v_index');
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
    public function store(Request $request)
    {
        $n = $request->frequency;
        $validatorFreq = Validator::make($request->all(), [
            'frequency' => 'required',
        ]);
        if ($request->$n == '0') {
            $validatorSelect = Validator::make($request->all(), [
                $n => 'required',
            ]);
                if ($validatorSelect->fails()) {
                    if ($n == '1') {
                        Alert::toast('Please select Hour', 'error');
                        return back()
                                ->withErrors($validatorSelect)
                                ->withInput($request->all());
                    }elseif ($n == '2') {
                        Alert::toast('Please select Day', 'error');
                        return back()
                                ->withErrors($validatorSelect)
                                ->withInput($request->all());
                    }elseif ($n == '3') {
                        Alert::toast('Please select Week', 'error');
                        return back()
                                ->withErrors($validatorSelect)
                                ->withInput($request->all());
                    }elseif ($n == '4') {
                        Alert::toast('Please select Month', 'error');
                        return back()
                                ->withErrors($validatorSelect)
                                ->withInput($request->all());
                    }elseif ($n == '5') {
                        Alert::toast('Please select Year', 'error');
                        return back()
                                ->withErrors($validatorSelect)
                                ->withInput($request->all());
                    }else{
                    Alert::toast('Please select data', 'error');
                    return back()
                            ->withErrors($validatorSelect)
                            ->withInput($request->all());
                    }
                }
        }
        if ($validatorFreq->fails()) {
            Alert::toast('Please select frequency', 'error');
            return back()
                    ->withErrors($validatorFreq)
                    ->withInput($request->all());
        }
        $request->merge([
           'duration' => $request->$n
            ]);

        // dd($request->all());
        // dd($request->$n);
    }
}
