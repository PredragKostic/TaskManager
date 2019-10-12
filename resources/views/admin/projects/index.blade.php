@extends('admin.layout')

@section('content')

<!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('admin/home') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Projects</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  	 <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Summary</th>
                    <th>Budget</th>
                    <th>Is Visible</th>
                    <th>Created</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($projects as $project)
                  <tr>
                    <td>{{ $project->id }}</td>
                    <td><a href="{{ url('admin/projects/' . $project->id . '/edit') }}">{{ $project->title }}</a></td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->summary }}</td>
                    <td>{{ $project->budget }}</td>
                    <td>{{ $project->is_visible }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>
                    	<form onclick="return confirm('Are you sure you want to delete this item?');" method="POST" action="{{ route('projects.destroy' , $project->id) }}">
                    		@csrf
                    		@method('DELETE')
                    		<button type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                    	</form>
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
                </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
<div class="container">
  
  {{ $projects->links() }}

</div>
        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

@endsection