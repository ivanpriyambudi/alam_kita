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
use Auth;
use DB;

class LandController extends Controller
{


    ///////////////////////////////////////////////////////////////////////// info gunung
    public function land_info()
    {
        $gunungs = Gunung::all();
        $gunung = Gunung::all();
        $jalur = Jalur::all();
        $camp = Camp::all();

        return view('landing.land-info-gunung',compact('gunungs','gunung','jalur','camp'));
    }

    public function land_info2($nama)
    {
        $gunungs = Gunung::all();
        $gunung = Gunung::where('nama', $nama)->get();

        return view('landing.land-info-gunung',compact('gunung','gunungs'));
    }

    ///////////////////////////////////////////////////////////////////// artikel
    public function land_artikel()
    {
        $artikel = Artikel::all();

        return view('landing.land-artikel',compact('artikel'));
    }

    ///////////////////////////////////////////////////////////////////// register
    public function regis_view()
    {

        return view('regis');
    }

    ///////////////////////////////////////////////////////////////////// register USer

    public function regis_user_view()
    {
        return view('regis_user');
    }

    public function regis_user_action(Request $Request)
    {
        $post = new User();
        $post->name=$Request->input('name');
        $post->email=$Request->input('email');
        $post->password=Hash::make($Request->input('password'));
        $post->alamat=$Request->input('alamat');
        $post->kelamin=$Request->input('kelamin');
        $post->tgl_lahir=$Request->input('tgl_lahir');
        $post->tempat_lahir=$Request->input('tempat_lahir');
        $post->deskripsi=$Request->input('deskripsi');
        $post->kontak=$Request->input('kontak');

        $file=$Request->file('image');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;

        $post->save();

        return redirect('/login');
    }

    ///////////////////////////////////////////////////////////////////// Basecamp

    public function regis_basecamp_pil_3($gunung_id, $id)
    {
        $gunung = Gunung::where('id', $gunung_id)->get();
        $jalur = Jalur::where('gunung_id', $id)->get();

        return view('regis_basecamp_pil_3', compact('gunung','jalur'));
    }

    public function regis_basecamp_pil_1()
    {
        $gunung = Gunung::all();

        return view('regis_basecamp_pil_1', compact('gunung'));
    }

    public function regis_basecamp_pil_2($id)
    {
        $gunung = Gunung::where('id', $id)->get();
        $jalur = Jalur::where('gunung_id', $id)->get();

        return view('regis_basecamp_pil_2', compact('gunung','jalur'));
    }


    public function regis_basecamp_action(Request $Request, $gunung_id, $jalur_id)
    {
        $pos = Jalur::find($jalur_id);

        $post = new Camp();
        $post->nama=$Request->input('nama');
        $post->email=$Request->input('email');
        $post->password=Hash::make($Request->input('password'));
        $post->alamat=$Request->input('alamat');
        $post->kontak=$Request->input('kontak');
        $post->deskripsi=$Request->input('deskripsi');
        $post->jalur_id=$Request->input('jalur_id');
        $post->gunung_id=$Request->input('gunung_id');
        $post->status=$Request->input('status');
        
        $pos->status_camp=$Request->input('status_camp');

        $file=$Request->file('image');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;

        $pos->save();
        $post->save();

        return redirect('/login');
    }

    ///////////////////////////////////////////////////////////////////// Detail Gunung

    public function land_info_gunung_detail($id)
    {
        $gunung = Gunung::where('id', $id)->get();
        $jalur = Jalur::where('gunung_id', $id)->get();

        return view('landing.detail.info-gunung',compact('gunung', 'jalur'));
    }

    public function land_info_jalur_detail($gunung_id, $id)
    {
        $gunung = Gunung::where('id', $gunung_id)->get();
        $jalur = Jalur::where('id', $id)->get();
        $pos = Pos::where('jalur_id', $id)->get();

        return view('landing.detail.info-jalur',compact('gunung','jalur','pos'));
    }

    ///////////////////////////////////////////////////////////////////// Detail Artikel

    public function land_artikel_detail($id)
    {
        $artikel = Artikel::where('id', $id)->get();

        return view('landing.detail.info-artikel',compact('artikel'));
    }

    ///////////////////////////////////////////////////////////////////// Profile

    public function profile_view($id)
    {
        $user = User::where('id', $id)->get();
        $petualangan = Petualangan::where('user_id', $id)->get();

        return view('landing.profile.profile-user',compact('user','petualangan'));
    }

    public function profile_edit_view($id)
    {
        $user = User::where('id', $id)->get();

        return view('landing.profile.profile-user-edit',compact('user'));
    }

    public function profile_edit_action(Request $Request, $id)
    {
        $post = User::find($id);

        $post->name=$Request->input('name');
        $post->email=$Request->input('email');
        $post->password=Hash::make($Request->input('password'));
        $post->alamat=$Request->input('alamat');
        $post->kelamin=$Request->input('kelamin');
        $post->tgl_lahir=$Request->input('tgl_lahir');
        $post->tempat_lahir=$Request->input('tempat_lahir');
        $post->deskripsi=$Request->input('deskripsi');
        $post->kontak=$Request->input('kontak');
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

        return redirect('/login');
    }

}
