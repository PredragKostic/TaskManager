@extends('admin.layout')

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin/home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/projects') }}">Projects</a>
      </li>
    <li class="breadcrumb-item active">Create</li>
 </ol>

<form method="POST" action="{{ route('projects.store') }}">
	@csrf
	
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
    @if($errors->has('title'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="slug" class="form-control" id="slug" placeholder="Slug" name="Slug" value="{{ old('slug') }}">
    
  </div>

  <div class="form-group">
    <label for="summary">Summary</label>
    <input type="text" class="form-control" id="summary" placeholder="Summary" name="summary" value="{{ old('summary') }}">
    @if($errors->has('summary'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('summary') }}</strong>
        </span>
    @endif
  </div>

<div class="form-group">
    <label for="budget">Budget</label>
    <input type="text" class="form-control" id="budget" placeholder="Budget" name="budget" value="{{ old('budget') }}">
    @if($errors->has('budget'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('budget') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="is_visible" name="is_visible">
    <label class="form-check-label" for="block">Is Visible</label>
  </div>

    
      
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
