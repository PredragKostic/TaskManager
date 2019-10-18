@extends('admin.layout')


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin/home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/tasks') }}">Tasks</a>
      </li>
    <li class="breadcrumb-item active">Edit</li>
 </ol>

<form method="POST" action="{{ route('tasks.update', $task->id) }}">
	@csrf

  @method('PUT')
	
  <div class="form-group">
    <label for="project_id">Project</label>
    <select name="project_id" id="project_id" class="form-control js-example-basic-single">
      @foreach($projects as $project)
        <option value="{{ $project->id }}" @if($project->id == $task->project_id) selected="selected" @endif>{{ $project->title }}</option>
      @endforeach
    </select>
    @if($errors->has('project_id'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('project_id') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="user_id">User</label>
    <select name="user_id" id="user_id" class="form-control js-example-basic-single">
      @foreach($users as $user)
        <option value="{{ $user->id }}" @if($user->id == $task->user_id) selected="selected" @endif>{{ $user->name }}</option>
      @endforeach
    </select>
    @if($errors->has('user_id'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('user_id') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $task->title }}">
    @if($errors->has('title'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="slug" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{ $task->slug }}">
    
  </div>

   
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" placeholder="Content" name="content">{{ $task->content }}</textarea>
    @if($errors->has('content'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
  </div>

   
  <div class="form-group form-check">
    <input @if($task->is_visible) checked="checked" @endif type="checkbox" class="form-check-input" id="is_visible" name="is_visible" value="1">
    <label class="form-check-label" for="block">Is Visible</label>
  </div>

  <div class="form-group form-check">
    <input @if($task->is_done) checked="checked" @endif type="checkbox" class="form-check-input" id="is_done" name="is_done" value="1">
    <label class="form-check-label" for="block">Is done</label>
  </div>
      
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection


