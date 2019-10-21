<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Carbon\Carbon;
use App\Task;

class PracticesController extends Controller
{
    //Komentar sa id = 12
    public function task1(){
    	 //return Comment::find(12);
    	return Comment::where('id', 12)->first();

    }

    //Prvi komentar ciji je id veci od 12
    public function task2(){
    	return Comment::where('id', '>', 12)->first();
    }

    //Sve komentare ciji je id veci od 5 i manji od 15
    public function task3(){
    	return Comment::where('id', '>', 5)->where('id', '<', 15)->get();
    }

    //Sve komentare ciji je id manji od 5 i veci od 15
    public function task4(){
    	return Comment::where('id', '<', 5)->orWhere('id', '>', 15)->get();
    } 

    //Sve komentare od danas pocevsi od najnovijeg
    public function task5(){
    	$start = Carbon::now()->startOfDay();
    	return Comment::where('created_at', '>', $start)->orderBy('created_at', 'desc')->get();
    }

    //Daj mi 10 komentare od juce pocevsi od najnovijeg
    public function task6(){
    	$start = Carbon::now()->startOfDay()->subDays(1)->format('Y-m-d H:m:s');
    	$end = Carbon::now()->endOfDay()->subDays(1)->format('Y-m-d H:m:s');

    	return Comment::where('created_at', '>', $start)->where('created_at', '<', $end)
    		->orderBy('created_at', 'desc')->limit(10)->get();
    }

    //Svi komentri pocevsi od najnovijeg sa task id = 12
    public function task7(){
    	//$task = Task::find(12);
    	//return $task->comments()->orderBy('created_at', 'desc')->get();
    	return Task::find(12)->comments()->orderBy('created_at', 'desc')->get();
    }

}
