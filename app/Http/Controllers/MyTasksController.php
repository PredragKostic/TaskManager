<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class MyTasksController extends Controller
{
    public function index(){
    	$projects = Project::whereHas('tasks', function($query){
    		$query->where('user_id', auth()->user()->id);
    	})->with(['tasks' => function($query){
    		$query->where('user_id', auth()->user()->id);
    	}])->get();

    	return view('admin.pages.my_tasks', compact('projects'));
    }
}
