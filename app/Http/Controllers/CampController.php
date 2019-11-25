<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\Admin;
use App\Gunung;
use App\Jalur;
use App\Pos;
use App\Artikel;
use App\Camp;
use App\Petualangan;
use App\Anggota;
use Auth;
use DB;

class CampController extends Controller
{
	public function camp_petualangan($id)
	{
		$petualangan = Petualangan::where('jalur_id', $id)->get();

		return view('camp.camp-petualangan',compact('petualangan'));
	}

	public function camp_petualangan_detail($id)
	{
		$petualangan = Petualangan::where('id', $id)->get();
		$anggota = Anggota::where('petualangan_id', $id)->get();

		return view('camp.camp-petualangan-detail',compact('petualangan','anggota'));
	}

	public function camp_petualangan_status(Request $Request, $id)
	{
		$post = Petualangan::find($id);

		$post->status=$Request->input('status');
		$post->save();

		return redirect('/camp/petualangan/detail/'.$id);
	}

	public function camp_profile($id)
	{
		$user = Camp::where('id', $id)->get();

		return view('camp.camp-profile-detail',compact('user'));
	}

	public function camp_profile_edit_view($id)
	{
		$user = Camp::where('id', $id)->get();

		return view('camp.camp-profile-edit',compact('user'));
	}

	public function camp__profile_edit_action(Request $Request, $id)
    {
        $post = Camp::find($id);

        $post->nama=$Request->input('nama');
        $post->email=$Request->input('email');
        $post->password=Hash::make($Request->input('password'));
        $post->alamat=$Request->input('alamat');
        $post->kontak=$Request->input('kontak');
        $post->deskripsi=$Request->input('deskripsi');
        $post->jalur_id=$Request->input('jalur_id');
        $post->gunung_id=$Request->input('gunung_id');
        $post->status=$Request->input('status');
        $post->id=$Request->input('id');

        $file=$Request->file('image');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;

        $post->save();

        return redirect('/camp/profile/'.$post->id);
    }

    public function camp_profile_delete(Request $Request, $id, $jalur_id)
    {
        Camp::where('id', $id)->delete();
        $pos = Jalur::find($jalur_id);
        $pos->status_camp=$Request->input('status_camp');

        $pos->save();

        return redirect('/logout');
    }

    public function camp_status(Request $Request, $id, $camp_id)
    {
     $post = Jalur::find($id);
     $post->status=$Request->input('status');

     $post->save();

     return redirect('/camp/profile/'.$camp_id);
 }
}
