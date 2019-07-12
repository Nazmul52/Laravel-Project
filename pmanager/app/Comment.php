<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = [
  	'comment_body',
  	'commentable_type',
  	'url',
  	'user_id',
  	// 'days',
  	// 'hours',
  	// 'project_id',
  	'commentable_id',
  	// 'company_id',
  ];

  public function commentable(){
    return $this->morphTo();
  }


  public function user(){
    return $this->hasOne('\App\User', 'id', 'user_id');
  }

 
}
