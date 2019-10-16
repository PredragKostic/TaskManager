@extends('admin.layout')

@section('content')

<!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('admin/home') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Comments</li>
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
                    
                    <th>Task</th>
                    <th>Is Visible</th>
                    <th>Created</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($comments as $comment)
                  <tr>
                    <td>{{ $comment->id }}</td>
                    
                    <td>{{ $comment->task->title }}</td>
                    <td>{{ $comment->is_visible }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>
                    	<form onclick="return confirm('Are you sure you want to delete this item?');" method="POST" action="{{ route('comments.destroy' , $comment->id) }}">
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
          
          {{ $comments->links() }}
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

@endsection