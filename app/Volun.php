<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volun extends Model
{
    protected $table = "volunter";
    protected $fillable = ['nama_lengkap','email','jenis_kelamin',
    'tempat','tanggal_lahir','alamat','instansi','alasan',
'pengalaman','alergi','riwayat_penyakit','foto','tempat'];
}
