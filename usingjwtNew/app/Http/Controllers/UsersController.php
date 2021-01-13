<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('content.users');
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
}
