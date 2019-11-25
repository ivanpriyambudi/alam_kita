<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('landing/land-home');
})->name('home');

// hanya untuk tamu yg belum auth
Route::get('/login', 'LoginController@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');

Route::get('/registration', 'LandController@regis_view')
->name('regisView')
->middleware('guest');

Route::get('/registration/user', 'LandController@regis_user_view')
->name('regisUserView')
->middleware('guest');

// regis basecamp
Route::get('/registration/basecamp/add/3/{gunung_id}/{id}', 'LandController@regis_basecamp_pil_3')
->name('regisBasecampViewPil3')
->middleware('guest');

Route::get('/registration/basecamp/1', 'LandController@regis_basecamp_pil_1')
->name('regisBasecampViewPil1')
->middleware('guest');

Route::get('/registration/basecamp/2/{id}', 'LandController@regis_basecamp_pil_2')
->name('regisBasecampViewPil2')
->middleware('guest');

Route::post('/registration/basecamp/action/{gunung_id}/{id}', 'LandController@regis_basecamp_action')
->name('regisBasecampAction')
->middleware('guest');
// /regis basecamp

Route::post('/registration/user/action', 'LandController@regis_user_action')
->name('regisUserAction')
->middleware('guest');

Route::post('/registration/basecamp', 'LandController@regis_basecamp_action')
->name('regisBasecampAction')
->middleware('guest');


Route::get('/admin', function() {
	return view('admin/admin-dashboard');
})->middleware('auth:admin');

Route::get('/user', function() {
	return view('user/user-dashboard');
})
->name('userDashboard')
->middleware('auth:user');


Route::get('/camp', function() {
	return view('camp/camp-dashboard');
})->middleware('auth:camp');

/* -------------------------Dashboard---------------------------------------------------- */

Route::get('/admin/dashboard', 'AdminController@dashboard')
->name('AdminDashboard')
->middleware('auth:admin');

/* -------------------------/Dashboard--------------------------------------------------- */


/* -------------------------Info Gunung-------------------------------------------------- */

Route::get('/admin/info-gunung', 'AdminController@infogunung_view')
->name('AdminInfoGunung')
->middleware('auth:admin');

Route::post('/admin/info-gunung/status/{id}', 'AdminController@infogunung_status')
->name('AdminStatusGunung')
->middleware('auth:admin');

Route::get('/admin/add-gunung', 'AdminController@infogunung_addgunung_view')
->name('AdminInfoGunungAddView')
->middleware('auth:admin');

Route::post('/admin/add-gunung/action', 'AdminController@infogunung_addgunung_action')
->name('AdminInfoGunungAddAction')
->middleware('auth:admin');

Route::get('/admin/info-gunung-detail/{id}', 'AdminController@infogunung_detail')
->name('AdminInfoGunungDetail')
->middleware('auth:admin');

Route::post('/admin/delete-gunung/{id}', 'AdminController@infogunung_delete')
->name('AdminDeleteGunung')
->middleware('auth:admin');

Route::get('/admin/edit-gunung/{id}', 'AdminController@infogunung_edit_view')
->name('AdminInfoGunungEditView')
->middleware('auth:admin');

Route::post('/admin/edit-gunung/action/{id}', 'AdminController@infogunung_edit_action')
->name('AdminInfoGunungEditAction')
->middleware('auth:admin');



Route::get('/admin/add-jalur/{id}', 'AdminController@infogunung_addjalur_view')
->name('AdminAddJalurView')
->middleware('auth:admin');

Route::post('/admin/info-gunung/jalur/status/{id}/{gunung_id}', 'AdminController@infogunung_jalur_status')
->name('AdminStatusJalur')
->middleware('auth:admin');

Route::post('/admin/add-jalur/action', 'AdminController@infogunung_addjalur_action')
->name('AdminAddJalurAction')
->middleware('auth:admin');

Route::get('/admin/detail-jalur/{gunung_id}/{id}', 'AdminController@infogunung_detailjalur_view')
->name('AdminDetailJalurView')
->middleware('auth:admin');

Route::post('/admin/delete-jalur/{gunung_id}/{id}', 'AdminController@infogunung_jalur_delete')
->name('AdminDeleteJalur')
->middleware('auth:admin');

Route::get('/admin/edit-jalur/{gunung_id}/{id}', 'AdminController@infogunung_jalur_edit_view')
->name('AdminInfoJalurEditView')
->middleware('auth:admin');

Route::post('/admin/edit-jalur/action/{gunung_id}/{id}', 'AdminController@infogunung_jalur_edit_action')
->name('AdminInfoJalurEditAction')
->middleware('auth:admin');

Route::post('/admin/add-pos/action', 'AdminController@infogunung_addpos_action')
->name('AdminAddPosAction')
->middleware('auth:admin');

Route::get('/admin/detail-pos/{gunung_id}/{jalur_id}/{id}', 'AdminController@infogunung_detailpos_view')
->name('AdminDetailPosView')
->middleware('auth:admin');

Route::post('/admin/delete-pos/{gunung_id}/{jalur_id}/{id}', 'AdminController@infogunung_pos_delete')
->name('AdminDeletePos')
->middleware('auth:admin');

Route::post('/admin/edit-pos/action/{gunung_id}/{jalur_id}/{id}', 'AdminController@infogunung_pos_edit_action')
->name('AdminInfoPosEditAction')
->middleware('auth:admin');

/* -------------------------/Info Gunung-------------------------------------------------- */

/* -------------------------Artikel------------------------------------------------------- */

Route::get('/admin/artikel', 'AdminController@artikel_view')
->name('ArtikelView')
->middleware('auth:admin');

Route::get('/admin/artikel/add-artikel', 'AdminController@artikel_add_view')
->name('ArtikelAddView')
->middleware('auth:admin');

Route::post('/admin/artikel/add-artikel/action', 'AdminController@artikel_add_action')
->name('ArtikelAddAction')
->middleware('auth:admin');

Route::get('/admin/artikel/detail-artikel/{id}', 'AdminController@artikel_detail_view')
->name('ArtikelDetailView')
->middleware('auth:admin');

Route::get('/admin/artikel/edit-artikel/{id}', 'AdminController@artikel_edit_view')
->name('ArtikelEditView')
->middleware('auth:admin');

Route::post('/admin/artikel/edit-artikel/action/{id}', 'AdminController@artikel_edit_action')
->name('ArtikelEditAction')
->middleware('auth:admin');

Route::post('/admin/artikel/delete/action/{id}', 'AdminController@artikel_delete')
->name('ArtikelDeleteAction')
->middleware('auth:admin');

/* -------------------------/Artikel------------------------------------------------------ */

/* -------------------------Camp------------------------------------------------------ */

Route::get('/admin/camp', 'AdminController@camp_view')
->name('CampView')
->middleware('auth:admin');

Route::get('/admin/camp/addcamp/{gunung_id}/{jalur_id}', 'AdminController@camp_add_view')
->name('CampAddView')
->middleware('auth:admin');

Route::post('/admin/camp/addcamp/action/{gunung_id}/{jalur_id}', 'AdminController@camp_add_action')
->name('CampAddAction')
->middleware('auth:admin');

Route::get('/admin/camp/detail/{id}/{jalur_id}/{gunung_id}', 'AdminController@camp_detail_view')
->name('CampDetailView')
->middleware('auth:admin');

Route::post('/admin/camp/delete/action/{id}/{jalur_id}', 'AdminController@camp_delete')
->name('CampDeleteAction')
->middleware('auth:admin');

Route::get('/admin/camp/editcamp/{gunung_id}/{jalur_id}/{id}', 'AdminController@camp_edit_view')
->name('CampViewAction')
->middleware('auth:admin');

Route::post('/admin/camp/editcamp/action/{gunung_id}/{jalur_id}/{id}', 'AdminController@camp_edit_action')
->name('CampEditAction')
->middleware('auth:admin');

/* -------------------------/Camp------------------------------------------------------ */

/* -------------------------Petualangan------------------------------------------------------ */
Route::get('/admin/petualangan/', 'AdminController@petualangan_admin')
->name('AdminPetualangan')
->middleware('auth:admin');

Route::get('/admin/petualangan/detail/{id}', 'AdminController@petualangan_detail_admin')
->name('AdminDetailPetualangan')
->middleware('auth:admin');

Route::post('/admin/petualangan/status/{id}', 'AdminController@petualangan_status_admin')
->name('AdminStatusPetualangan')
->middleware('auth:admin');

Route::post('/admin/petualangan/delete/{id}', 'AdminController@petualangan_delete_admin')
->name('AdminDeletePetualangan')
->middleware('auth:admin');

Route::get('/admin/petualangan/edit/{id}', 'AdminController@petualangan_edit_view_admin')
->name('AdminEditViewPetualangan')
->middleware('auth:admin');

Route::post('/admin/petualangan/edit/action/{id}', 'AdminController@petualangan_edit_action_admin')
->name('AdminEditActionPetualangan')
->middleware('auth:admin');
/* -------------------------/Petualangan------------------------------------------------------ */

/* -------------------------User------------------------------------------------------ */
Route::get('/admin/user/', 'AdminController@user_admin')
->name('AdminUser')
->middleware('auth:admin');

Route::get('/admin/user/detail/{id}', 'AdminController@user_detail_admin')
->name('AdminDetailUser')
->middleware('auth:admin');

Route::post('/admin/user/delete/{id}', 'AdminController@user_delete')
->name('AdminDeleteUser')
->middleware('auth:admin');

Route::get('/admin/user/edit/{id}', 'AdminController@user_edit_view_admin')
->name('AdminEditViewUser')
->middleware('auth:admin');

Route::get('/admin/user/edit/action/{id}', 'AdminController@user_edit_admin')
->name('AdminEditActionUser')
->middleware('auth:admin');
/* -------------------------/User------------------------------------------------------ */



/* -------------------------Landing Page------------------------------------------------------ */

Route::get('/info-gunung', 'LandController@land_info')
->name('LandInfo');

Route::get('/info-gunung/{nama}', 'LandController@land_info2')
->name('LandInfo2');

Route::get('/artikel', 'LandController@land_artikel')
->name('LandArtikel');

////////////////////////////////////////////////////////////////////////// detail

//////////////////////////////////////////////////////////// gunung
Route::get('/info-gunung/detail/{id}', 'LandController@land_info_gunung_detail')
->name('LandInfoDetail');

/////////////////////////////////////////////////////////// jalur & pos
Route::get('/info-jalur/detail/{gunung_id}/{id}', 'LandController@land_info_jalur_detail')
->name('LandJalurDetail');

/////////////////////////////////////////////////////////// artikel
Route::get('/artikel/detail/{id}', 'LandController@land_artikel_detail')
->name('LandArtikelDetail');

/* -------------------------/Landing Page------------------------------------------------------ */



/* -------------------------User Page------------------------------------------------------ */

Route::get('/user/dashboard/petualangan/{id}', 'PetualanganController@petualangan_dash_view')
->name('PetualanganDashView')
->middleware('auth:user');

Route::get('/user/petualangan/edit/{id}', 'PetualanganController@petualangan_edit_view')
->name('PetualanganEditView')
->middleware('auth:user');

Route::post('/petualangan/edit/action/{id}', 'PetualanganController@petualangan_edit_action')
->name('PetualnganEditAction')
->middleware('auth:user');

Route::get('/user/petualangan/{gunung_id}/{jalur_id}', 'PetualanganController@petualangan_add_view')
->name('PetualanganAddView')
->middleware('auth:user');

Route::post('/petualangan/add/action', 'PetualanganController@petualangan_add_action')
->name('PetualnganAddAction')
->middleware('auth:user');

Route::get('/user/dashboard/petualangan/detail/{id}', 'PetualanganController@petualangan_detail_view')
->name('PetualanganDetailDashView')
->middleware('auth:user');


Route::post('/petualangan/delete/{user_id}/{id}', 'PetualanganController@petualangan_delete')
->name('PetualnganDelete')
->middleware('auth:user');

Route::get('/user/petualangan/', 'PetualanganController@petualangan')
->name('Petualangan')
->middleware('auth:user');

Route::get('/user/pet/detail/{id}', 'PetualanganController@petualangan_land_detail')
->name('PetualanganDetail')
->middleware('auth:user');

Route::post('/user/pet/dash/leave/{user_id}', 'PetualanganController@petualangan_leave_action')
->name('PetualanganLeave')
->middleware('auth:user');

Route::post('/user/pet/leave/{user_id}', 'PetualanganController@petualangan_leave2_action')
->name('PetualanganLeave2')
->middleware('auth:user');

/////////////////////////////////////////////////////diskusi

Route::get('/user/diskusi/{id}', 'DiskusiController@diskusi_view')
->name('DiskusiView')
->middleware('auth:user');

Route::post('/user/diskusi/add', 'DiskusiController@diskusi_add')
->name('DiskusiAdd')
->middleware('auth:user');

Route::post('/user/anggota/add', 'PetualanganController@petualangan_gabung_action')
->name('AnggotaAdd')
->middleware('auth:user');

//////////////////////////////////////////////////////// profile
Route::get('/landing/profile/{id}', 'landController@profile_view')
->name('ProfileView')
->middleware('auth:user');

Route::get('/landing/profile/edit/{id}', 'landController@profile_edit_view')
->name('ProfileEditView')
->middleware('auth:user');

Route::post('/landing/profile/edit/action/{id}', 'landController@profile_edit_action')
->name('ProfileEditAction')
->middleware('auth:user');

/* -------------------------/User Page------------------------------------------------------ */

/* -------------------------Camp Page------------------------------------------------------ */

Route::get('/camp/petualangan/{id}', 'CampController@camp_petualangan')
->name('CampPetualangan')
->middleware('auth:camp');

Route::get('/camp/petualangan/detail/{id}', 'CampController@camp_petualangan_detail')
->name('CampPetualanganDetail')
->middleware('auth:camp');

Route::post('/camp/petualangan/detail/status/{id}', 'CampController@camp_petualangan_status')
->name('CampPetualanganStatus')
->middleware('auth:camp');

Route::get('/camp/profile/{id}', 'CampController@camp_profile')
->name('CampProfile')
->middleware('auth:camp');

Route::get('/camp/profile/edit/{id}', 'CampController@camp_profile_edit_view')
->name('CampProfileEditView')
->middleware('auth:camp');

Route::post('/camp/profile/edit/action/{id}', 'CampController@camp__profile_edit_action')
->name('CampProfileEditAction')
->middleware('auth:camp');

Route::post('/camp/profile/delete/action/{id}/{jalur_id}', 'CampController@camp_profile_delete')
->name('CampProfileDeleteAction')
->middleware('auth:camp');

Route::post('/camp/status/{id}/{camp_id}', 'CampController@camp_status')
->name('CampStatusJalur')
->middleware('auth:camp');

/* -------------------------/Camp Page------------------------------------------------------ */