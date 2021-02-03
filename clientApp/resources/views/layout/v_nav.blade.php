<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">MENU</li>
        <li class="nav-item">
            <a href="/" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Master Client</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/contracts" class="nav-link {{ (request()->is('contracts')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Create Contract</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/projects" class="nav-link {{ (request()->is('projects')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Create Project</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/operationals" class="nav-link {{ (request()->is('operationals')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>Operational & Cost-POxxxx</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/progress_status" class="nav-link {{ (request()->is('progress_status')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>Master Status</p>
            </a>
        </li>

        <li class="col-2 nav-item fixed-bottom">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p class="text">Logout</p>
            </a>
        </li>
    </ul>
    </li>
    </ul>
</nav>
