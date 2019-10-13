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
        $project = Project::create(request()->all());  	
        $project->users()->sync(request('user_ids'));
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

        $project->update(request()->all());
    	
        $project->users()->sync(request('user_ids'));
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
