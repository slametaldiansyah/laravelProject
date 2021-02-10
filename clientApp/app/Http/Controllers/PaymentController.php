<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $invoiceList = Invoice::with('project','project.contract.client','progress_item')->get();
        // $invoiceList = Invoice::all();
        return view('payments.v_index', compact('invoiceList'));
    //  return view('payments.v_index');
    }
}
