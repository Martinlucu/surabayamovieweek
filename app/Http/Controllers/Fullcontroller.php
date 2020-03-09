<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Nilai;
use Illuminate\Support\Facades\Auth;
class Fullcontroller extends Controller
{
    
    public function full(){
        $juri= Auth::user()->id;
   	 $nilai = Nilai::all()->where('id_juri',$juri);
    	 return view('full',['nilai' => $nilai]);
   }
   public function njuri(){
    $nilai = Nilai::all();
     return view('njuri',['nilai' => $nilai]);
}
}
