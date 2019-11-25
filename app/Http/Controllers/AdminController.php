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
use App\User;
use DB;

class AdminController extends Controller
{
    public function home()
    {
    	return view ('admin.login');
    }

    //////////////////////////////////////////////////////////////////// dashboard

    public function dashboard()
    {
    	return view ('admin.admin-dashboard');
    }

    //////////////////////////////////////////////////////////////////// /dashboard

    //////////////////////////////////////////////////////////////////// info gunung

    public function infogunung_view()
    {
        $gunung = Gunung::all();

        return view ('admin.gunung.admin-info-gunung',compact('gunung'));
    }

    public function infogunung_addgunung_view()
    {

        return view('admin.gunung.admin-info-gunung-addgunung');
    }

    public function infogunung_addgunung_action(Request $Request)
    {
        $post = new Gunung();
        $post->nama=$Request->input('nama');
        $post->tinggi=$Request->input('tinggi');
        $post->propinsi=$Request->input('propinsi');
        $post->kota=$Request->input('kota');
        $post->deskripsi=$Request->input('deskripsi');
        $post->status=$Request->input('status');

        $file=$Request->file('foto');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;
        
        $post->save();

        return redirect('/admin/info-gunung');
    }

    public function infogunung_detail($id)
    {
        $gunung = Gunung::where('id', $id)->get();
        $jalur = Jalur::where('gunung_id', $id)->get();
        $pos = Pos::where('jalur_id', $id)->get();

        return view('admin.gunung.admin-info-gunung-detail',compact('gunung','jalur','pos'));
    }

    public function infogunung_delete($id)
    {
        Gunung::where('id', $id)->delete();

        return redirect('/admin/info-gunung');
    }

    public function infogunung_edit_view($id)
    {
        $gunung = Gunung::where('id', $id)->get();

        return view('admin.gunung.admin-info-gunung-editgunung', compact('gunung'));
    }

    public function infogunung_edit_action(Request $Request, $id)
    {
        $post = Gunung::find($id);
        $post->nama=$Request->input('nama');
        $post->tinggi=$Request->input('tinggi');
        $post->propinsi=$Request->input('propinsi');
        $post->kota=$Request->input('kota');
        $post->deskripsi=$Request->input('deskripsi');
        $post->status=$Request->input('status');
        $post->id=$Request->input('id');

        $file=$Request->file('foto');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;
        // dd($post);
        $post->save();

        return redirect('admin/info-gunung-detail/'.$post->id=$Request->input('id'));
    }

    public function infogunung_status(Request $Request, $id)
    {
       $post = Gunung::find($id);
       $post->status=$Request->input('status');

       $post->save();

       return redirect('admin/info-gunung-detail/'.$id);
    }

    //////////////////////////////////////////////////////////////////// info gunung - jalur

    public function infogunung_addjalur_view($id)
    {
        $gunung = Gunung::where('id', $id)->get();

        return view('admin.gunung.admin-info-gunung-addjalur',compact('gunung'));
    }

    public function infogunung_jalur_status(Request $Request, $id, $gunung_id)
    {
       $post = Jalur::find($id);
       $post->status=$Request->input('status');

       $post->save();

       return redirect('admin/detail-jalur/'.$gunung_id.'/'.$id);
    }

    public function infogunung_addjalur_action(Request $Request )
    {

        $post = new Jalur();
        $post->gunung_id=$Request->input('gunung_id');
        $post->nama=$Request->input('nama');
        $post->estimasi=$Request->input('estimasi');
        $post->tarif=$Request->input('tarif');
        $post->lokasi=$Request->input('lokasi');
        $post->kontak=$Request->input('kontak');
        $post->akses=$Request->input('akses');
        $post->status=$Request->input('status');
        $post->deskripsi=$Request->input('deskripsi');
        $post->status_camp=$Request->input('status_camp');

        $file=$Request->file('foto');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;


        $file2=$Request->file('peta');
        if (!$file2) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name2=$file2->getClientOriginalName();
        $path2=public_path('/img');
        $file2->move($path2,$file_name2);
        $post->peta='public/img/'.$file_name2;

        $post->save();

        return redirect('/admin/info-gunung-detail/'.$post->gunung_id);
    }

    public function infogunung_detailjalur_view($gunung_id, $id)
    {
        $gunung = Gunung::where('id', $gunung_id)->get();
        $jalur = Jalur::where('id', $id)->get();
        $pos = Pos::where('jalur_id', $id)->get();
        $camp = Camp::where('jalur_id', $id)->get();

        return view('admin.gunung.admin-info-jalur-detail',compact('gunung','jalur','pos','camp'));
    }

    public function infogunung_jalur_delete($gunung_id, $id)
    {

        Jalur::where('id', $id)->delete();
        $link=Gunung::where('id', $gunung_id)->get();

        return redirect('/admin/info-gunung-detail/'.$gunung_id);
    }

    public function infogunung_jalur_edit_view($gunung_id, $id)
    {
        $gunung = Gunung::where('id', $id)->get();
        $jalur = Jalur::where('id', $id)->get();

        return view('admin.gunung.admin-info-gunung-editjalur',compact('gunung','jalur'));
    }

    public function infogunung_jalur_edit_action(Request $Request, $gunung_id, $id)
    {
        $post = Jalur::find($id);
        $post->gunung_id=$Request->input('gunung_id');
        $post->nama=$Request->input('nama');
        $post->estimasi=$Request->input('estimasi');
        $post->tarif=$Request->input('tarif');
        $post->lokasi=$Request->input('lokasi');
        $post->kontak=$Request->input('kontak');
        $post->akses=$Request->input('akses');
        $post->status=$Request->input('status');
        $post->deskripsi=$Request->input('deskripsi');
        $post->id=$Request->input('id');

        $file=$Request->file('foto');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;


        $file2=$Request->file('peta');
        if (!$file2) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name2=$file2->getClientOriginalName();
        $path2=public_path('/img');
        $file2->move($path2,$file_name2);
        $post->peta='public/img/'.$file_name2;

        $post->save();

        return redirect('admin/detail-jalur/'.$post->gunung_id.'/'.$post->id);
    }

    ///////////////////////////////////////////////////////////////// info gunung-pos

    public function infogunung_addpos_action(Request $Request)
    {
        $post = new Pos();
        $post->gunung_id=$Request->input('gunung_id');
        $post->jalur_id=$Request->input('jalur_id');
        $post->nama=$Request->input('nama');
        $post->no_pos=$Request->input('no_pos');
        $post->estimasi=$Request->input('estimasi');
        $post->deskripsi=$Request->input('deskripsi');
        $post->image=$Request->input('image');

        $file=$Request->file('foto');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;

        $post->save();

        return redirect('/admin/detail-jalur/'.$post->gunung_id.'/'.$post->jalur_id);
    }

    public function infogunung_detailpos_view($gunung_id, $jalur_id, $id)
    {
        $gunung = Gunung::where('id', $gunung_id)->get();
        $jalur = Jalur::where('id', $jalur_id)->get();
        $pos = Pos::where('id', $id)->get();

        return view('admin.gunung.admin-info-pos-detail',compact('gunung','jalur','pos'));
    }

    public function infogunung_pos_delete($gunung_id, $jalur_id, $id)
    {

        Pos::where('id', $id)->delete();
        $link=Gunung::where('id', $gunung_id)->get();
        $link2=Jalur::where('id', $jalur_id)->get();

        return redirect('/admin/detail-jalur/'.$gunung_id.'/'.$jalur_id);
    }

    public function infogunung_pos_edit_action(Request $Request, $gunung_id, $jalur_id, $id)
    {
        $post = Pos::find($id);
        $post->gunung_id=$Request->input('gunung_id');
        $post->jalur_id=$Request->input('jalur_id');
        $post->nama=$Request->input('nama');
        $post->no_pos=$Request->input('no_pos');
        $post->estimasi=$Request->input('estimasi');
        $post->deskripsi=$Request->input('deskripsi');
        $post->image=$Request->input('image');
        $post->id=$Request->input('id');

        $file=$Request->file('foto');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;

        $post->save();

        return redirect('/admin/detail-pos/'.$post->gunung_id.'/'.$post->jalur_id.'/'.$post->id);
    }

    //////////////////////////////////////////////////////////////////// /info gunung

    /////////////////////////////////////////////////////////////////// Artikel

    public function artikel_view()
    {
        $artikel = Artikel::all();

        return view('admin.artikel.admin-artikel',compact('artikel'));
    }

    public function artikel_add_view()
    {
        return view('admin.artikel.admin-artikel-addartikel');
    }

    public function artikel_add_action(Request $Request)
    {
        $post = new Artikel();
        $post->judul=$Request->input('judul');
        $post->konten=$Request->input('konten');

        $file=$Request->file('image');
        if (!$file) {
            return redirect()->route('admin-info-gunung-addgunung');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $post->image='public/img/'.$file_name;

        $post->save();

        return redirect('/admin/artikel');
    }

    public function artikel_detail_view($id)
    {
        $artikel = Artikel::where('id', $id)->get();

        return view('admin.artikel.admin-artikel-detail',compact('artikel'));
    }

    public function artikel_delete($id)
    {
        Artikel::where('id', $id)->delete();

        return redirect('/admin/artikel');
    }

    public function artikel_edit_view($id)
    {
        $artikel = Artikel::where('id', $id)->get();

        return view('admin.artikel.admin-artikel-edit',compact('artikel'));
    }

    public function artikel_edit_action(Request $Request, $id)
    {
        $post = Artikel::find($id);
        $post->judul=$Request->input('judul');
        $post->konten=$Request->input('konten');
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

        return redirect('admin/artikel/detail-artikel/'.$post->id);
    }

    /////////////////////////////////////////////////////////////////// /Artikel

    ////////////////////////////////////////////////////////////////// Camp

    public function camp_view()
    {
        $camp = Camp::all();
        $gunung = Gunung::all();
        $jalur = Jalur::all();

        return view('admin.camp.admin-camp',compact('camp','gunung','jalur'));
    }

    public function camp_add_view($gunung_id, $jalur_id)
    {
        $gunung = Gunung::where('id', $gunung_id)->get();
        $jalur = Jalur::where('id', $jalur_id)->get();

        return view('admin.camp.admin-camp-addcamp',compact('gunung','jalur'));
    }


    public function camp_add_action(Request $Request, $gunung_id, $jalur_id)
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

        return redirect('/admin/detail-jalur/'.$post->gunung_id.'/'.$post->jalur_id);
    }

    public function camp_detail_view($id, $jalur_id, $gunung_id)
    {
        $camp = Camp::where('id', $id)->get();
        $jalur = Jalur::where('id', $jalur_id)->get();
        $gunung = Gunung::where('id', $gunung_id)->get();

        return view('admin.camp.admin-camp-detail',compact('camp','jalur','gunung'));
    }

    public function camp_delete(Request $Request, $id, $jalur_id)
    {
        Camp::where('id', $id)->delete();
        $pos = Jalur::find($jalur_id);
        $pos->status_camp=$Request->input('status_camp');

        $pos->save();

        return redirect('/admin/camp');
    }

    public function camp_edit_view($gunung_id, $jalur_id, $id)
    {
        $camp = Camp::where('id', $id)->get();
        $jalur = Jalur::where('id', $jalur_id)->get();
        $gunung = Gunung::where('id', $gunung_id)->get();

        return view('admin.camp.admin-camp-editcamp',compact('gunung','jalur','camp'));
    }

    public function camp_edit_action(Request $Request, $gunung_id, $jalur_id, $id)
    {
        $pos = Jalur::find($jalur_id);

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

        return redirect('/admin/camp/detail/'.$post->id.'/'.$post->jalur_id.'/'.$post->gunung_id);
    }

    ///////////////////////////////////////////////////////////////// /Camp

    ///////////////////////////////////////////////////////////////// Petualangan
    public function petualangan_admin()
    {
        $petualangan = Petualangan::all();

        return view('admin.petualangan.admin-petualangan',compact('petualangan'));
    }

    public function petualangan_detail_admin($id)
    {
        $petualangan = Petualangan::where('id', $id)->get();
        $anggota = Anggota::where('petualangan_id', $id)->get();

        return view('admin.petualangan.admin-petualangan-detail',compact('petualangan','anggota'));
    }

    public function petualangan_status_admin(Request $Request, $id)
    {
        $post = Petualangan::find($id);

        $post->status=$Request->input('status');
        $post->save();

        return redirect('/admin/petualangan/detail/'.$id);
    }

    public function petualangan_delete_admin($id)
    {
        Petualangan::where('id', $id)->delete();

        return redirect('/admin/petualangan/');
    }

    public function petualangan_edit_view_admin($id)
    {
        $petualangan = Petualangan::where('id', $id)->get();

        return view('admin.petualangan.admin-petualangan-edit',compact('petualangan'));
    }

    public function petualangan_edit_action_admin(Request $Request, $id)
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

        return redirect('/admin/petualangan/detail/'.$post->id);
    }


    ///////////////////////////////////////////////////////////////// /Petualangan

    public function user_admin()
    {
        $user = User::all();

        return view('admin.user.admin-user',compact('user'));
    }

    public function user_detail_admin($id)
    {
        $user = User::where('id', $id)->get();

        return view('admin.user.admin-user-detail',compact('user'));
    }

    public function user_delete($id)
    {
        User::where('id', $id)->delete();

        return redirect('/admin/user');
    }

    public function user_edit_view_admin($id)
    {
        $user = User::where('id', $id)->get();

        return view('admin.user.admin-user-edit',compact('user'));
    }

    public function user_edit_admin(Request $Request, $id)
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

        return redirect('/admin/user/detail/'.$post->id);
    }

}
