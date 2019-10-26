<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Carbon\Carbon;
use App\Task;
use App\Project;
use App\User;

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

    	//return Comment::where('created_at', '>', $start)->where('created_at', '<', $end)
    		//->orderBy('created_at', 'desc')->limit(10)->get();

        return Comment::whereBetween('created_at',[$start, $end])
            ->orderBy('created_at', 'desc')->limit(10)->get();
    }

    //Svi komentri pocevsi od najnovijeg sa task id = 12
    public function task7(){
    	//$task = Task::find(12);
    	//return $task->comments()->orderBy('created_at', 'desc')->get();
    	return Task::find(12)->comments()->orderBy('created_at', 'desc')->get();
    }

    //Svi taskovi koji nemaju komentare (content i id)
    public function task8(){
        return Task::select('id', 'content')->doesntHave('comments')->get();
    }

    //Broj taskova koji nemaju komentare 
    public function task9(){
        return Task::doesntHave('comments')->count();
    }

    //Poslednjih deset taskova sa brojem komentara
    public function task10(){
        return Task::withCount('comments')->orderBy('created_at', 'desc')->limit(10)->get();
    }

    //Pet poslednjih komentara zajedno sa taskom i userom kome pripada
    public function task11(){
        return Comment::with('task','user')->orderBy('created_at', 'desc')->limit(5)->get();
    }

    //Prvih 5 taskova koji imaju minimum 3 komentara
    public function task12(){
        return Task::has('comments', '>=', '3')->limit(5)->get();
    }

    //Sve komentare koji u contentu imaju rec "et"
    public function task13(){
        return Comment::where('content', 'like', '%et%')->get();
    }

    //Sve komentare kojima contentt pocinje sa "est" ili da se zavrsava sa "quia" i is_visible = 1
    public function task14(){
        return Comment::where(function($query){
                $query->where('content', 'like', 'est%')->orWhere('content', 'like', '%quia');
        })->where('is_visible', 1)->get();
    }

    //Za korisnika id = 3 sve aktivne projekte gde je member zajedno sa brojem taskova po svakom projektu
    public function task15(){
        return User::find(3)->projectsPivot()->visible()->withCount('tasks')->get();

    }

    //Daj mi sve korisnike koji su admini na barem 2 projekta
    public function task16(){
        return User::has('projects', '>', 1)->get();
    }

    //Daj mi sve usere koji su memberi na barem 7 projekta
    public function task17(){
        return User::has('projectsPivot', '>', 6)->get();
    }

    //Sve taskove koji imaju barem 3 vidjiva komentara i koji nisu uradjeni
    public function task18(){
        return Task::whereHas('comments', function($query){
            $query->visible();
        },'>', 2)->where('is_done', 0)->get();
    }

    //

}
