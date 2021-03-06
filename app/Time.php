<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'task_id', 'amount',
    ];

    public function isAuthor(){
        return $this->user_id == auth()->user()->id;
    }

    public function canMakeChanges(){

        return auth()->user()->isAdmin() || $this->isAuthor();
    }
    
    /**
     * Get the post that belongs to user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

}
