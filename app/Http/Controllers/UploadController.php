<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gambar;
class UploadController extends Controller
{
    public function upload(Request $request)
{
    $messages = [
        'required' => ':attribute wajib diisi',
        'min' => 'minimal 10 kata',
        'max' => 'maximal 200mb',
        'mimes'=> 'pastikan format sudah benar'
    ];
    $this->validate($request, [
        'nama_kelompok'=> 'required',
        'email'=> 'required|email',
        'nama_sekolah'=> 'required',
        'nama_sutradara'=> 'required',
        'nama_penulis'=>'required',
        'link'=>'required',
        'poster' => 'required|file|image|mimes:jpeg,png,jpg',
        'film'=>'mimes:mp4,mov|file|required',
        'sinopsis' => 'required|min:10'
    ],$messages);

    // menyimpan data file yang diupload ke variabel $file
    $file = $request->file('poster');
    $video=$request->file('film');
    $foto=$request->file('foto_identitas');
    $nama_file = time()."_".$file->getClientOriginalName();
    $nama_file2 = time()."_".$video->getClientOriginalName();
    $nama_file3 = time()."_".$foto->getClientOriginalName();
              // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'data_file';
    $tujuan_upload2 = 'data_video';
    $tujuan_upload3 = 'data_foto';
    $file->move($tujuan_upload,$nama_file);
    $video->move($tujuan_upload2,$nama_file2);
    $foto->move($tujuan_upload3,$nama_file3);
    Gambar::create([
        'nama_kelompok' => $request->nama_kelompok,
		'email' => $request->email,
		'nama_sekolah' => $request->nama_sekolah,
        'nama_sutradara' => $request->nama_sutradara,
        'hp' => $request->hp,
        'kota' => $request->kota,
        'nama_penulis' => $request->nama_penulis,
        'link' => $request->link,
        'poster' => $nama_file,
        'film'=>$nama_file2,
        'foto_identitas'=>$nama_file3,
        'sinopsis' => $request->sinopsis
    ]);
	return redirect()->back();
}
}
