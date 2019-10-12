<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'user_id', 'summary', 'budget', 'is_visible', 'published_at',
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

    public function users(){
        return $this->belongsToMany('App\User');
    }

   
}
