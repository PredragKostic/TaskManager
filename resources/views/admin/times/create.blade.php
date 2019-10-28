@extends('admin.layout')


@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin/home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/times') }}">Times</a>
      </li>
    <li class="breadcrumb-item active">Create</li>
 </ol>

<form method="POST" action="{{ route('times.store') }}">
	@csrf
	
  <div class="form-group">
    <label for="user_id">User</label>
    <select name="user_id" id="user_id" class="form-control js-example-basic-single">
      @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
      @endforeach
    </select>
    @if($errors->has('user_id'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('user_id') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group">
    <label for="task_id">Task</label>
    <select name="task_id" id="task_id" class="form-control js-example-basic-single">
      @foreach($tasks as $task)
        <option value="{{ $task->id }}">{{ $task->title }}</option>
      @endforeach
    </select>
    @if($errors->has('task_id'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('task_id') }}</strong>
        </span>
    @endif
  </div>

  
  
  
   <div class="form-group">
    <label for="amount">Amount</label>
    <textarea class="form-control" id="amount" placeholder="Amount" name="amount">{{ old('amount') }}</textarea>
    @if($errors->has('amount'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('amount') }}</strong>
        </span>
    @endif
  </div>


      
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection


