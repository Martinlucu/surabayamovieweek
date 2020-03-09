<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use Illuminate\Support\Facades\DB;
class NilaiController extends Controller
{
    public function nilai()
    {
        $artikel = Article::all(); 
    }
}
