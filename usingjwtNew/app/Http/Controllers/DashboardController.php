<?php

namespace App\Http\Controllers;

use App\Models\Detail_user;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('content.dashboard');
    }


    //Position get
    public function positionList()
    {
        $usersQuery = Position::query();
        $position = $usersQuery->select('*');
        return datatables()->of($position)
            ->make(true);
    }

    public function detailuserList()
    {
        $usersQuery = Detail_user::query();
        $position = $usersQuery->select('*');
        return datatables()->of($position)
            ->make(true);
    }
}
