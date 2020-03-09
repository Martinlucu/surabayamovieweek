<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Nilai;
use App\Juri;
use App\User;
class DetailController extends Controller
{
    public function detail($id_profil)
    {
    	 //return view('full',['nilai' => $nilai]);
    	$profile = DB::table('profile')->where('id_profil',$id_profil)->get();
    	return view('detail',['profile' => $profile]);
    }
    public function nilai(Request $request)
{
    $kk1= $request->k1*0.25;
    $kk2= $request->k1*0.25;
    $kk3= $request->k3*0.25;
    $kk4= $request->k4*0.25;
    $total=$kk1+$kk2+$kk3+$kk4;

	Nilai::create([
        'kriteria1' => $request->k1,
		'kriteria2' => $request->k2,
		'kriteria3' => $request->k3,
        'kriteria4' => $request->k4,
        'nilai_hasil' => $total,
        'id_profil'=>$request->id_profil,
        'id_juri'=>$request->id_juri,
        'nama_kelompok'=>$request->nama_kelompok
    ]);
	return redirect()->back();
}
}
