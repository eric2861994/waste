<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    public $redirectTo = '/dataTP';
	
	private $user;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar, User $user)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);

		$this->user = $user;
	}
	
	public function postLogin(Request $request) {
//        $this->validate($request, [
//            'nik' => 'required', 'password' => 'required',
//        ]); //sudah pasti required di form

        $credentials = $request->only('nik', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
//            return response('sadf');
            // TODO Define Redirec path
            return redirect()->intended($this->redirectPath());
        }

        return redirect('/auth/login')
            ->withInput($request->only('username'))
            ->withErrors([
                'username' => 'Username/Password salah.',
            ]);
	}
	
	public function index() {
		$users = $this->user->get();
		
		return view('auth.list', compact('users'));
	}
}
