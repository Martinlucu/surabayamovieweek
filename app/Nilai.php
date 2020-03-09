<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Nilai extends Model
{
    protected $table = "nilai";
    protected $fillable = ['kriteria1','kriteria2','kriteria3',
    'kriteria4','nilai_hasil','id_juri','id_profil','nama_kelompok'];
    public function juri(){
    	return $this->belongsTo('App\Juri');
    }
}