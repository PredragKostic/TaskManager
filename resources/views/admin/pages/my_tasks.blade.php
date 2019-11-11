@extends('admin.layout')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">My Tasks</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>

 @foreach($projects as $project)

<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      <a href="{{ url('admin/projects/'.$project->id) }}">{{ $project->title }}</a></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Is Done</th>
              
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Is Done</th>
              
            </tr>
          </tfoot>
          <tbody>

            @foreach($project->tasks as $task)

            <tr>
              <td><a href="{{ url('admin/tasks/'.$task->id.'/edit') }}">{{ $task->title }}</a></td>
              <td>{{ $task->is_done ? 'yes' : 'no' }}</td>


            </tr>

            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

 @endforeach

  <!-- DataTables Example -->
  

@endsection