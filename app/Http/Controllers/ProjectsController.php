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
        $users = User::visible()->get();
    	return view('admin.projects.create', compact('users'));
    }

    public function store(CreateProjectRequest $request) {
        $project = Project::create(request()->all());  	
        $project->users()->sync(request('user_ids'));
    	return redirect('admin/projects');

    }

    public function show($id){
       $project = Project::withCount('unSolvedTasks', 'solvedTasks', 'users')->firstOrFail();

       $hours = $project->getHours();

        return view('admin.projects.show', compact('project', 'hours'));
    }

    public function edit(Project $project){
    	$project->load('users');

        if (!$project->canMakeChanges()){
            return redirect('admin/projects');
        }

        $users = User::visible()->get();
    	return view('admin.projects.edit', compact('project', 'users'));
    }

    public function update(CreateProjectRequest $request, Project $project) {
        

        if (!$project->canMakeChanges()){
            return redirect('admin/projects');
        }

        $project->update(request()->all());
    	
        $project->users()->sync(request('user_ids'));
    	return back();

    }

    public function destroy(Project $project){
        if ($project->canMakeChanges()){
           $project->delete();
        }

		
		return redirect('admin/projects');
    }
}
