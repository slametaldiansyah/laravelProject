<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    public function show(Request $request)
    {
        $get = Email::where('email_config_id', $request->id)->get();
        return response()->json(['dataE' => $get]);
    }
}
