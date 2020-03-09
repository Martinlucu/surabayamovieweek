<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EditnilaiController extends Controller
{
    public function editnilai($id_nilai)
    {
    	$nilai = DB::table('nilai')->where('id_nilai',$id_nilai)->get();
    	return view('editnilai',['nilai' => $nilai]);
    }
    public function perbarui(Request $request)
{

	$kk1= $request->k1*0.25;
    $kk2= $request->k1*0.25;
    $kk3= $request->k3*0.25;
    $kk4= $request->k4*0.25;
    $total=$kk1+$kk2+$kk3+$kk4;
    DB::table('nilai')->where('id_nilai',$request->id_nilai)->update([
        'kriteria1' => $request->k1,
        'kriteria2' => $request->k2,
		'kriteria3' => $request->k3,
        'kriteria4' => $request->k4,
        'nilai_hasil' => $total
	]);

    return redirect('/full');
    
}
}
