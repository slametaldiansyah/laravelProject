<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('config.typecontract.v_index', compact('types'));
    }

    public function destroy(Type $type)
    {
        Type::destroy($type->id);
        return redirect('/types')->with('status', 'Success Deleting Data!');
    }
}
