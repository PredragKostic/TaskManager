<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Str;
use App\Http\Requests\CreateProjectRequest;


class ProjectsController extends Controller
{
    public function index() {
        if(auth()->user()->isAdmin()){
            $projects = Project::paginate(50);
        }else{
            $projects = Project::where('user_id', auth()->user()->id)->paginate(2);
        }
    	
    	return view('admin.projects.index', compact('projects'));
    }

    public function create() {
        $users = User::where('block', 0)->get();
    	return view('admin.projects.create', compact('users'));
    }

    public function store(CreateProjectRequest $request) {
    	
        $project = new Project();
    	$project->user_id = auth()->user()->id;
    	$project->title = request('title');
    	$project->slug = request('slug') ? Str::slug(request('slug')) : Str::slug(request('title'));
    	$project->summary = request('summary');
    	$project->budget = request('budget');
    	$project->is_visible = request()->has('is_visible');
    	
    	$project->save();

        $project->users()->sync(request('user_id'));
    	return redirect('admin/projects');

    }

    public function edit($id){
    	$project = Project::with('users')->findOrFail($id);


        if (!$project->canMakeChanges()){
            return redirect('admin/projects');
        }

        $users = User::where('block', 0)->get();
    	return view('admin.projects.edit', compact('project', 'users'));
    }

    public function update(CreateProjectRequest $request, $id) {
    	
    	$project = Project::findOrFail($id);

        if (!$project->canMakeChanges()){
            return redirect('admin/projects');
        }

    	$project->user_id = auth()->user()->id;
    	$project->title = request('title');
    	$project->slug = request('slug') ? Str::slug(request('slug')) : Str::slug(request('title'));
    	$project->summary = request('summary');
    	$project->budget = request('budget');
    	$project->is_visible = request()->has('is_visible');
    	
    	$project->save();

        $project->users()->sync(request('user_id'));
    	return back();

    }

    public function destroy($id){
		$project = Project::findOrFail($id);

        if (!$project->canMakeChanges()){
            return redirect('admin/projects');
        }

		$project->delete();
		return redirect('admin/projects');
    }
}
