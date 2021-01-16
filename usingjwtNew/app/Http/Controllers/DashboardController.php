<?php

namespace App\Http\Controllers;

use App\Models\Detail_user;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('content.dashboard');
    }

    public function chartRole()
    {
        $rolechart = DB::table('role as r')
        ->select('r.name as name', DB::raw('COUNT(ar.id) as y'))
        ->join('auth_role as ar', 'ar.role_id', '=', 'r.id')
        ->groupBy('r.name')->get();

        return json_encode($rolechart);

    }

    public function chartAppication()
    {
        $appchart = DB::table('application as a')
        ->select('a.name as name', DB::raw('COUNT(ar.id) as y'))
        ->join('auth_role as ar', 'ar.application_id', '=', 'a.id')
        ->groupBy('a.name')->get();

        return json_encode($appchart);

    }

    public function chartPosition()
    {
        $positionchart = DB::table('position as p')
        ->select('p.name as name', DB::raw('COUNT(du.id) as y'))
        ->join('detail_user as du', 'du.position_id', '=', 'p.id')
        ->groupBy('p.name')->get();

        return json_encode($positionchart);

    }

    public function detailuserList()
    {
        $usersQuery = Detail_user::query();
        $position = $usersQuery->select('*');
        return datatables()->of($position)
            ->make(true);
    }
}
