@extends('admin.layout')


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin/home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/projects') }}">Projects</a>
      </li>
    <li class="breadcrumb-item active">Show</li>
 </ol>

<ul class="list-group">
  <li class="list-group-item">Title: {{ $project->title }}</li>
  <li class="list-group-item">Summary: {{ $project->summary }}</li>
  <li class="list-group-item">Number of solved tasks: {{ $project->solved_tasks_count }}</li>
  <li class="list-group-item">Number of unsolved tasks: {{ $project->un_solved_tasks_count }}</li>
  <li class="list-group-item">Number of subscribed users: {{ $project->users_count }}</li>
  <li class="list-group-item">Budget: ${{ $project->budget }}</li>
  <li class="list-group-item">Spending hours: {{ $hours }}h</li>
</ul>


@endsection

