<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\User;
use Illuminate\Support\Str;
use App\Http\Requests\CreateTaskRequest;

class TasksController extends Controller
{
    public function index() {
        if(auth()->user()->isAdmin()){
            $tasks = Task::with('project')->paginate(50);
        }else{
            $tasks = Project::with('project')->where('user_id', auth()->user()->id)->paginate(50);
        }
    	
    	return view('admin.tasks.index', compact('tasks'));
    }

    public function create() {
        $projects = Project::visible()->get();
    	return view('admin.tasks.create', compact('tasks', 'projects'));
    }
    public function store(CreateTaskRequest $request) {
        $task = Task::create(request()->all());  	
    	return redirect('admin/tasks');

    }

    public function edit($id){
    	$task = Task::findOrFail($id);

        if (!$task->canMakeChanges()){
            return redirect('admin/tasks');
        }

        $users = $task->project->users()->visible()->get();
        $projects = Project::visible()->get();
    	return view('admin.tasks.edit', compact('task', 'projects', 'users'));
    }

    public function update(CreateTaskRequest $request, $id) {
        $task = Task::findOrFail($id);

        if (!$task->canMakeChanges()){
            return redirect('admin/tasks');
        }

        $task->update(request()->all());
    	
    	return back();

    }

    public function destroy($id){
		$task = Task::findOrFail($id);

        if (!$task->canMakeChanges()){
            return redirect('admin/tasks');
        }

		$task->delete();
		return redirect('admin/tasks');
    }
}
