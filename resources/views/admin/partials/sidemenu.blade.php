<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
    <a class="nav-link" href="{{ url('admin/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>My tasks</span></a>
    </li>

    @if(auth()->user()->isAdmin())
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Users</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/users/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/users') }}">View</a>       
      </div>
    </li>
    @endif
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Projects</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/projects/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/projects') }}">View</a>
        </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Tasks</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/tasks/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/tasks') }}">View</a>
        </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Comments</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/comments/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/comments') }}">View</a>
        </div>
    </li>
    
    
  </ul>
