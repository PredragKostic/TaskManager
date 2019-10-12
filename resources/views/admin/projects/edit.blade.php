@extends('admin.layout')

@section('css')

<link href="{{ url('admin/css/select2.min.css') }}" rel="stylesheet" type="text/css">


@endsection

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin/home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/projects') }}">Projects</a>
      </li>
    <li class="breadcrumb-item active">Edit</li>
 </ol>

<form method="POST" action="{{ route('projects.update',$project->id) }}">
	@csrf
	@method('PUT')

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $project->title }}">
    @if($errors->has('title'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="slug" class="form-control" id="slug" placeholder="Slug" name="Slug" value="{{ $project->slug }}">
    
  </div>

  <div class="form-group">
    <label for="budget">Budget</label>
    <input type="text" class="form-control" id="budget" placeholder="Budget" name="budget" value="{{ $project->budget }}">
    @if($errors->has('budget'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('budget') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="summary">Summary</label>
    <input type="text" class="form-control" id="summary" placeholder="Summary" name="summary" value="{{ $project->summary }}">
    @if($errors->has('summary'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('summary') }}</strong>
        </span>
    @endif
  </div>


  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="is_visible" name="is_visible" @if($project->is_visible) checked="checked" @endif>
    <label class="form-check-label" for="block">Is Visible</label>
  </div>

  <div class="form-group">
    <label for="user_id">Members</label>
    <select name="user_id[]" id="user_id" class="form-control js-example-basic-multiple" multiple="multiple">
      @foreach($users as $user)
        <option value="{{ $user->id }}" @if($project->users->contains($user->id)) selected="selected" @endif>{{ $user->name }}</option>
      @endforeach
    </select>
    @if($errors->has('user_id'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('user_id') }}</strong>
        </span>
    @endif
  </div>
      
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

@section('js')

<script src="{{ url('admin/js/select2.min.js') }}"></script>

<script>
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('.js-example-basic-multiple').select2();
     
});
</script>

@endsection