<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\Task;
use App\User;
use App\Http\Requests\CreateTimeRequest;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index() {
        if(auth()->user()->isAdmin()){
            $times = Time::paginate(50);
        }else{
            $times = auth()->user()->times()->paginate(50);
            //$times = Time::where('user_id', auth()->user()->id)->paginate(50);
        }
        
        return view('admin.times.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::visible()->get();
        $tasks = Task::visible()->get();
        return view('admin.times.create', compact('users', 'tasks'));
    }

    public function store(CreateTimeRequest $request) {
        $time =Time::create(request()->all());   
       
        return redirect('admin/times');
    }

    public function edit(Time $time)
    {
        $time->load('user');

        if (!$time->canMakeChanges()){
            return redirect('admin/times');
        }

        $users = User::visible()->get();
         $tasks = Task::visible()->get();
        return view('admin.times.edit', compact('time', 'users', 'tasks'));
    }

    
    public function update(CreateTimeRequest $request, Time $time)
    {
    
        if (!$time->canMakeChanges()){
            return redirect('admin/times');
        }

        $time->update(request()->all());
        
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        if ($time->canMakeChanges()){
            $time->delete();
        }

       
        return redirect('admin/times');
    
    }
}
