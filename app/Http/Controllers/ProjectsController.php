<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Str;
use App\Http\Requests\CreateProjectRequest;


class ProjectsController extends Controller
{
    public function index() {
        if(auth()->user()->admin){
            $projects = Projectject::paginate(50);
        }else{
            $projects = Project::where('user_id', auth()->user()->id)->paginate(2);
        }
    	
    	return view('admin.projects.index', compact('projects'));
    }

    public function create() {
    	return view('admin.projects.create');
    }

    public function store(CreateProjectRequest $request) {
    	
    	$project = new Project();
    	$project->user_id = auth()->user()->id;
    	$project->title = request('title');
    	$project->slug = request('slug') ? Str::slug(request('slug')) : Str::slug(request('title'));
    	$project->summary = request('summary');
    	$project->content = request('content');
    	$project->budget = request('budget');
    	$project->published_at = request('published_at');
    	$project->is_visible = request()->has('is_visible');
    	
    	$project->save();
    	return redirect('admin/projects');

    }

    public function edit($id){
    	$project = Project::findOrFail($id);

        if(!auth()->user()->admin || $project->user_id != auth()->user()->id){
            return redirect('admin/projecs');
        }

    	return view('admin.projects.edit', compact('project'));
    }

    public function update(CreateProjectRequest $request, $id) {
    	
    	$project = Project::findOrFail($id);

        if(!auth()->user()->admin || $project->user_id != auth()->user()->id){
            return redirect('admin/projects');
        }

    	$project->user_id = auth()->user()->id;
    	$project->title = request('title');
    	$project->slug = request('slug') ? Str::slug(request('slug')) : Str::slug(request('title'));
    	$project->summary = request('summary');
    	$project->budget = request('budget');
    	$project->published_at = request('published_at');
    	$project->is_visible = request()->has('is_visible');
    	
    	$project->save();
    	return back();

    }

    public function destroy($id){
		$project = Project::findOrFail($id);

        if(!auth()->user()->admin || $project->user_id != auth()->user()->id){
            return redirect('admin/projects');
        }

		$project->delete();
		return redirect('admin/projects');
    }
}
