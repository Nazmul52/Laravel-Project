<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $fillable = [
  	't_name',
  	'user_id',
  	'days',
  	'hours',
  	'project_id',
  	'company_id',
  ];


   public function user(){
        return $this->belongsTo('App\User');
    }

     public function project(){
        return $this->belongsTo('App\Project');
    }

     public function companies(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
