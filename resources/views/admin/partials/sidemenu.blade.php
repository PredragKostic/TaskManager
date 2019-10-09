<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
    <a class="nav-link" href="{{ url('admin/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
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
        <span>Posts</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/posts/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/posts') }}">View</a>
        
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Categories</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/categories/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/categories') }}">View</a>
        </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Tags</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/tags/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/tags') }}">View</a>
        </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Brands</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/brands/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/brands') }}">View</a>
        </div>
    </li>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Products</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ url('admin/products/create') }}">Create</a>
        <a class="dropdown-item" href="{{ url('admin/products') }}">View</a>
        </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
  </ul>
