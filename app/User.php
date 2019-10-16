<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use File;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'admin', 'block',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'image',
        'email_verified_at' => 'datetime',
    ];

    public function scopeVisible($query){
        $query->where('block', 0);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function setImageAttribute($value){
        File::delete($this->image);
        $this->attributes['image'] = $this->getImagePath('image');
    }

    public function getImagePath($fileName){
        return 'storage/'. request()->file($fileName)->storeAs('users', Str::slug($this->name) . '-' . $this->id. $fileName. '.' . request()->file($fileName)->getClientOriginalExtension());

    }

    public function getImageAttribute(){
        return $this->attributes['image'] ? url($this->attributes['image']) : null;
    }
   
    public function isAdmin(){
        return $this->admin == 1;
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}


    

