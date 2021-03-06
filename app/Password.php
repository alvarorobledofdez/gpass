<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    public function categories()
    {
   		return $this->belongsTo('App\Category');
    } 

	public function users()
    {
   		return $this->belongsTo('App\User');
    } 
}
