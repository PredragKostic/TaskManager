<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function users(){
        return $this->belongsToMany('App\User');
    }

   
}
