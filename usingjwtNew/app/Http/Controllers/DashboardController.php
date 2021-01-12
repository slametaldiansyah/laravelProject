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
    public function userList()
    {
        $usersQuery = User::query();
        // $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        // $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

        // if($start_date && $end_date){

        //  $start_date = date('Y-m-d', strtotime($start_date));
        //  $end_date = date('Y-m-d', strtotime($end_date));

        //  $usersQuery->whereRaw("date(users.created_at) >= '" . $start_date . "' AND date(users.created_at) <= '" . $end_date . "'");
        // }
        $users = $usersQuery->select('*');
        return datatables()->of($users)
            ->make(true);
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
