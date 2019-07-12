<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = [
  	'p_name',
  	'p_description',
  	'company_id',
  	'user_id',
  	'days',
  ];

   public function companies(){
        return $this->belongsTo('App\Company');
    }

     public function users(){
        return $this->belongsToMany('App\User');
    }

     public function tasks(){
        return $this->hasMany('App\Task');
    }


    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }


}
