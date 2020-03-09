<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Juri extends Model
{protected $table = "juri";
    public function nilai(){
    	return $this->hasMany('App\Nilai');
    	return $this->hasMany('App\User');
    }
}