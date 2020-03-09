<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        return view('user');

    }
public function update(Request $request)
{
    DB::table('users')->where('id',$request->id)->update([
        'email' => $request->email,
        'name' => $request->name,
		'hp' => $request->hp
    ]);
    return redirect()->back();
}
}
