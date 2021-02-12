<?php

namespace App\Http\Controllers;

use App\Models\Actual_payment;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Proof_of_invoice_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function index()
    {
        $clients= Client::all();
        $invoiceList = Invoice::with(
            'project',
            'project.contract.client',
            'progress_item')
            ->withCount(['actual_payment as actualPay' =>
            function($query)
            {
                $query->select(DB::raw('SUM(amount)'));
            }])->get();
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
          $request->validate([
          'amount' => 'required',
          'payment_date' => 'required|date',
          'filename' => 'required'
         ]);
         $id = Actual_payment::create($request->all())->id;
         $files = $request->file('filename');
        //  dd($files);
         if($files != 0){
                 $filename = time().'.'.$files->getClientOriginalName();
                 Proof_of_invoice_payment::create([
                 'actual_payment_id' => $id,
                 'user_upload' => $userid,
                 'filename' => $filename,
                 ]);
                 $files->move(public_path('proof_of_invoice_payment'), $filename);
                //  dd($cek);

         }else {
          Alert::toast('No files uploaded !!!', 'error');
         return back()->with('status', 'No files uploaded');
         }
         Alert::toast('Data Berhasil Ditambahkan !!!', 'success');
        return redirect('/payments');
    }
}
