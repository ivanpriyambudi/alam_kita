<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Petualangan;
use App\Diskusi;
use App\Anggota;
use Auth;
use DB;

class DiskusiController extends Controller
{
    public function diskusi_view($id)
    {
    	$petualangan = Petualangan::where('id', $id)->get();
    	$komen = Diskusi::where('petualangan_id', $id)->get();
        $anggota = Anggota::where('petualangan_id', $id)->get();
    
    	return view('user.user-diskusi',compact('petualangan','komen','anggota'));
    }

    public function diskusi_add(Request $Request)
    {
    	$post = new Diskusi();

    	$post->petualangan_id=$Request->input('petualangan_id');
    	$post->user_id=$Request->input('user_id');
    	$post->komen=$Request->input('komen');

    	$post->save();

    	return redirect('/user/diskusi/'.$post->petualangan_id);
    }
}
