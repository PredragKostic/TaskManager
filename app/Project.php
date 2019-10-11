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
        'title', 'slug', 'user_id', 'summary', 'budget', 'content', 'is_visible', 'published_at',
    ];

       /**
     * Get the post that belongs to user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

   
}
