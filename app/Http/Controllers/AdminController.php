<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller {
	public function index() {
		$error = '';
		
		return view("login_view_admin", ['error' => $error]);
	}
	public function verifyLogin(Request $request){
		$username = $request->input('username');
		$password = md5($request->input('password'));
		
		$user = DB::table('users')
				->where([
					['username', '=', $username],
					['password', '=', $password],
				])->first();
		
		if ($user) {
			$user_id = $user->user_id;
			$username = $user->username;
			
			Session::put('user_id', $user_id);
			Session::put('username', $username);
			
			return redirect('welcome_admin');
		} else {
			$error = "Wrong username or password";
			
			return redirect()->route('login_view_admin_view', $error);
		}
	}
	
	public function errorLogin($error) {
		return view('login_view_admin', ['error' => $error]);
	}
	
	public function welcomeLogin() {
		$welcome = '';
		$login_state = '';
		$username = '';
			
		if (Session::has('user_id')) {
			$welcome = 'Welcome';
			$login_state = "login";
			$username = Session::get('username');
			session_start();
		}
		
		return view('welcome_view_admin', ['welcome' => $welcome, 'login_state' => $login_state, 'username' => $username]);
	}
	
	public function logoutLogin() {
		Session::forget('user_id');
		
		return redirect('login_view_admin');
	}
}