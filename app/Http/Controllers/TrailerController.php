<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TrailerController extends Controller
{
    public function trailer()
    {
        $profile = DB::table('profile')->paginate(4);;
    	return view('trailer',['profile' => $profile]);
    }
}
