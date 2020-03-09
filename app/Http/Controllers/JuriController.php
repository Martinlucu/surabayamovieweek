<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JuriController extends Controller
{
    public function juri()
    {
       // $nilai = DB::table('nilai')->where('id_juri',$id_profil)->get();
    	$profile = DB::table('profile')->paginate(5);	
    	return view('juri',['profile' => $profile]);
 
    }
}
