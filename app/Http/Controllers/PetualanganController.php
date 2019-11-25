<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\Gunung;
use App\Jalur;
use App\Pos;
use App\Artikel;
use App\Camp;
use App\User;
use App\Petualangan;
use App\Anggota;
use Auth;
use DB;

class PetualanganController extends Controller
{
	public function petualangan_dash_view($id)
	{
		$petualangan = Petualangan::where('user_id', $id)->get();
		$anggota = Anggota::where('user_id', $id)->get();

		return view('user.user-petualangan',compact('petualangan','anggota'));
	}

	public function petualangan_add_view($gunung_id, $jalur_id)
	{
		$gunung = Gunung::where('id', $gunung_id)->get();
		$jalur = Jalur::where('id', $jalur_id)->get();

		return view('user.petualangan.petualangan-add',compact('gunung','jalur'));
	}

	public function petualangan_add_action(Request $Request)
	{
		$post = new Petualangan();
		$post->gunung_id=$Request->input('gunung_id');
		$post->user_id=$Request->input('user_id');
		$post->jalur_id=$Request->input('jalur_id');
		$post->tempat=$Request->input('tempat');
		$post->deskripsi=$Request->input('deskripsi');
		$post->waktu=$Request->input('waktu');
		$post->status=$Request->input('status');

		$post->save();

		return redirect('/user/dashboard/petualangan/'.$post->user_id);
	}

	public function petualangan_edit_view($id)
	{
		$petualangan = Petualangan::where('id', $id)->get();

		return view('user.user-edit-petualangan', compact('petualangan'));
	}

	public function petualangan_edit_action(Request $Request, $id)
	{
		$post = Petualangan::find($id);
		$post->gunung_id=$Request->input('gunung_id');
		$post->user_id=$Request->input('user_id');
		$post->jalur_id=$Request->input('jalur_id');
		$post->tempat=$Request->input('tempat');
		$post->deskripsi=$Request->input('deskripsi');
		$post->waktu=$Request->input('waktu');
		$post->status=$Request->input('status');
		$post->id=$Request->input('id');

		$post->save();

		return redirect('/user/dashboard/petualangan/detail/'.$post->id);
	}

	public function petualangan_delete($user_id, $id)
	{

		Petualangan::where('id', $id)->delete();
		$link=Gunung::where('id', $user_id)->get();

		return redirect('/user/dashboard/petualangan/'.$user_id);
	}

	public function petualangan_detail_view($id)
	{
		$petualangan = Petualangan::where('id', $id)->get();

		return view('user.user-dash-petualangan-detail',compact('petualangan'));
	}

	public function petualangan()
	{
		$petualangan = Petualangan::all();

		return view('user.petualangan.petualangan',compact('petualangan'));
	}

	public function petualangan_land_detail($id)
	{
		$petualangan = Petualangan::where('id', $id)->get();

		return view('user.petualangan.petualangan-land-detail',compact('petualangan'));
	}

	public function petualangan_gabung_action(Request $Request)
	{
		$post = new Anggota();

		$post->petualangan_id=$Request->input('petualangan_id');
    	$post->user_id=$Request->input('user_id');
    	$post->gunung_id=$Request->input('gunung_id');
    	$post->jalur_id=$Request->input('jalur_id');
    	$post->status=$Request->input('status');

		$post->save();

		return redirect('/user/diskusi/'.$post->petualangan_id);
	}

	public function petualangan_leave_action($user_id)
	{
		Anggota::where('user_id', $user_id)->delete();

		return redirect('/user/dashboard/petualangan/'.$user_id);
	}

	public function petualangan_leave2_action($user_id)
	{
		Anggota::where('user_id', $user_id)->delete();

		return redirect('/user/petualangan/');
	}

}
