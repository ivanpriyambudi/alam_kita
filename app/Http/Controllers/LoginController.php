<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use APP\Camp;
use Auth;

class LoginController extends Controller
{
  public function getLogin()
  {
    return view('login');
  }
  public function postLogin(Request $request)
  {
      // Validate the form data
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);
      // Attempt to log the user in
      // Passwordnya pake bcrypt
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
      return redirect()->intended('/admin');
    } else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->intended('/user');
    } else if (Auth::guard('camp')->attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->intended('/camp');
    } else {
      return redirect()->intended('/login');
    }
  }
  public function logout()
  {
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    } else if (Auth::guard('user')->check()) {
      Auth::guard('user')->logout();
    } else if (Auth::guard('camp')->check()) {
      Auth::guard('camp')->logout();
    }
    return redirect('/');
  }
}