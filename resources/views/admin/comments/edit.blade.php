@extends('admin.layout')


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin/home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/comments') }}">Comments</a>
      </li>
    <li class="breadcrumb-item active">Edit</li>
 </ol>

<form method="POST" action="{{ route('comments.update', $comment->id) }}">
	@csrf

  @method('PUT')
	
  <div class="form-group">
    <label for="task_id">Task</label>
    <select name="task_id" id="task_id" class="form-control js-example-basic-single">
      @foreach($tasks as $task)
        <option value="{{ $task->id }}" @if($task->id == $comment->task_id) selected="selected" @endif>{{ $task->title }}</option>
      @endforeach
    </select>
    @if($errors->has('task_id'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('task_id') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="user_id">User</label>
    <select name="user_id" id="user_id" class="form-control js-example-basic-single">
      @foreach($users as $user)
        <option value="{{ $user->id }}" @if($user->id == $comment->user_id) selected="selected" @endif>{{ $user->name }}</option>
      @endforeach
    </select>
    @if($errors->has('user_id'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('user_id') }}</strong>
        </span>
    @endif
  </div>

     
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" placeholder="Content" name="content">{{ $comment->content }}</textarea>
    @if($errors->has('content'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
  </div>

   
  <div class="form-group form-check">
    <input @if($comment->is_visible) checked="checked" @endif type="checkbox" class="form-check-input" id="is_visible" name="is_visible" value="1">
    <label class="form-check-label" for="block">Is Visible</label>
  </div>
      
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection


