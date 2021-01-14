<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\AuthRole;
use App\Models\Role;
use Illuminate\Http\Request;

class AppAccessController extends Controller
{
      //Application
      public function application()
      {
          return view('content.appaccess.application');
      }
      public function applicationList()
      {
          $usersQuery = Application::query();
          $users = $usersQuery->select('*');
          return datatables()->of($users)
              ->make(true);
      }
      //Role
      public function role()
      {
          return view('content.appaccess.role');
      }
      public function roleList()
      {
          $usersQuery = Role::query();
          $users = $usersQuery->select('*');
          return datatables()->of($users)
              ->make(true);
      }
      //Auth Role
      public function authRole()
      {
          return view('content.appaccess.authrole');
      }
      public function authRoleList()
      {
          $appQuery = AuthRole::query();
          $app = $appQuery->select('r.name as rolename', 'a.name as applicationname', 'u.username')
                                ->join('users as u', 'u.id', '=', 'auth_role.user_id')
                                ->join('role as r', 'r.id', '=', 'auth_role.role_id')
                                ->join('application as a', 'a.id', '=', 'auth_role.application_id')
                                ->get();
        //   var_dump($users);
        //   die();
          return datatables()->of($app)
              ->make(true);
      }
}
