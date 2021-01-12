 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">Name : {{ session()->get('token')['user']['name'] }}</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard

                  </p>
                </a>

              </li>
               {{-- <li class="nav-item">
                <a href="{{route('accessmenu')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Access menu {{session()->get('token')['user']['role']}}
                  </p>
                </a>



              </li> --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Role Access
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                        @php
                            $sessioncek = session()->get('token')['user']['accessrole'];
                            $menu = DB::select("SELECT  menu.name
                            FROM menuaccess
                            JOIN roleaccess ON menuaccess.accessroleId=roleaccess.id
                            JOIN menu ON menuaccess.menuId=menu.id
                            WHERE roleaccess.name = '$sessioncek'");
                        @endphp
                @foreach ($menu as $key => $item)
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $item->name }}</p>
                      </a>
                    </li>

                @endforeach
                </ul>
              </li> --}}



          <li class="nav-item mt-5">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
