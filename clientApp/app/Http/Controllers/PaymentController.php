<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $clients= Client::all();
        $invoiceList = Invoice::with('project','project.contract.client','progress_item')->get();
        return view('payments.v_index', compact('invoiceList','clients'));
    }

    public function store(Request $request)
    {
        $harga_str = preg_replace("/[^0-9]/", "" , $request->amount);
        $harga_int = (int)$harga_str;
        $userid = session()->get('token')['user']['id'];
        $request->merge([
            'amount' => $harga_int,
            'user_confirm' => $userid,
        ]);
        dd($request->user_confirm);

          $request->validate([
          'amount' => 'required',
          'payment_date' => 'required|date'
         ]);
        // Client::create($request->all());
        // return redirect('/');
    }
}
