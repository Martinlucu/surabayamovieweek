<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Gambar extends Model
{
    protected $table = "profile";
    protected $fillable = ['nama_kelompok','email','nama_sekolah',
    'nama_sutradara','nama_penulis','link','poster','film',
    'sinopsis','kota','foto_identitas','hp'];
}