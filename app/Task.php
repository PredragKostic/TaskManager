<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
   protected $fillable = [
        'title', 'slug', 'user_id', 'project_id', 'content', 'is_visible',
    ];


	public function setSlugAttribute($value){
        $this->attributes['slug'] = $value ? Str::slug($value) : Str::slug($this->attributes['title']);
    }

    public function isAssign(){
    	return $this->project->user_id == auth()->user()->id;
	
	}
        

    public function canMakeChanges(){

        return auth()->user()->isAdmin() || $this->isAssign();
    }

   public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }
}