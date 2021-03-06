<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('three', ['except' => ['notice', 'redirect', 'jadwal']]);
        $this->middleware('zero', ['only' => 'notice']);
        $this->middleware('one', ['only' => 'jadwal']);
    }

    public $DEFAULT_ROLE = 'masyarakat';

    public function notice() {
        return view('users.notice');
    }

    public function jadwal() {
        return view('users.jadwal');
    }

    public function redirect() {
        if (Auth::check())
            switch (Auth::user()->level()) {
                case 0:
                    return redirect()->route('user.notice');
                    break;
                case 1:
                    return redirect()->route('user.jadwal');
                    break;
                case 2:
                    return redirect()->route('entry.create_tps');
                    break;
                case 3:
                    return redirect()->route('dataTP.summary');
                    break;
                default:
                    break;
            }
        else
            return redirect('auth/login');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::where('role', 'waste_pemantau')->orWhere('role', 'waste_tps')->orWhere('role', 'waste_penyapu')
            ->orWhere('role', 'waste_pengangkut')->get();

        return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
        $user = User::where('nik', $req->nik)->first();
        if (is_null($user) || $user->role != $this->DEFAULT_ROLE)
            return redirect()->back()->withErrors(['error' => 'user tidak ada atau bukan merupakan masyarkat biasa']);

        $user->update($req->input());
        return redirect()->route('user.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{
        if (!in_array($user->role, ['waste_pemantau', 'waste_penyapu', 'waste_pengangkut', 'waste_tps']))
            return redirect()->route('user.index');

        return view('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(User $user, Request $req)
	{
        if (!in_array($user->role, ['waste_pemantau', 'waste_penyapu', 'waste_pengangkut', 'waste_tps']))
            return redirect()->back()->withErrors(['error' => 'user bukan anggota waste']);

        $user->update($req->input());

        return redirect()->route('user.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{
        if (!in_array($user->role, ['waste_pemantau', 'waste_penyapu', 'waste_pengangkut', 'waste_tps']))
            return redirect()->back()->withErrors(['error' => 'user bukan anggota waste']);

		$user->update(['role' => 'masyarakat']);

        return redirect()->route('user.index');
	}

}
