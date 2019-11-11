<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class Project extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'user_id', 'summary', 'budget', 'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function scopeVisible($query){
        $query->where('is_visible', 1);
    }

    public function isAuthor(){
        return $this->user_id == auth()->user()->id;
    }

    public function canMakeChanges(){

        return auth()->user()->isAdmin() || $this->isAuthor();
    }

    public function setSlugAttribute($value){
        $this->attributes['slug'] = $value ? Str::slug($value) : Str::slug($this->attributes['title']);
    }

    public function getHours(){
        $seconds =  Self::select(DB::raw('sum(TIME_TO_SEC(times.amount)) as amount_sum'))
            ->join('tasks', 'projects.id', '=', 'tasks.project_id')
            ->join('times', 'tasks.id', '=', 'times.task_id')
            ->where('projects.id', $this->id)
            ->groupBy('projects.id')
            ->first();

            return round($seconds->amount_sum / 3600);
    }

    /**
     * Get the post that belongs to user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function solvedTasks()
    {
        return $this->hasMany('App\Task')->where('is_done', 1);
    }

    public function unSolvedTasks()
    {
        return $this->hasMany('App\Task')->where('is_done', 0);
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

   
}
