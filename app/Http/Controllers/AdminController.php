<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\lolos;
use App\Mail\tidaklolos;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
    public function admin()
    {
    	$profile = DB::table('profile')->paginate(5);	
    	return view('admin',['profile' => $profile]);
 
    }
    public function setuju($id_profil)
{
	$email = DB::table('profile')->where('id_profil',$id_profil)->get('email');
	// update data pegawai
	DB::table('profile')->where('id_profil',$id_profil)->update([
        'status' => 1
	]);
	Mail::to($email)->send(new lolos());
    return redirect('/admin');
}
public function hapus($id_profil)
	{ 
		$email = DB::table('profile')->where('id_profil',$id_profil)->get('email');
		DB::table('profile')->where('id_profil',$id_profil)->update([
			'status' => 2
		]);
		Mail::to($email)->send(new tidaklolos());
		return redirect('/admin');
	}
}
