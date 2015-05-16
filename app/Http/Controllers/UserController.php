<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//		$users = User::where('role', 'waste_pemantau')->orWhere('role', 'waste_tps')->orWhere('role', 'waste_penyapu')
//            ->orWhere('role', 'waste_pengangkut')->get();
        $users = User::all();

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
        // TODO tambahkan validasi
        $user = User::where('nik', $req->nik)->first();
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
        // TODO tambahkan validasi
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
        // TODO tambahkan validasi
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
        // TODO tambahkan validasi
		$user->update(['role' => 'dukcapil_masyarakat']);

        return redirect()->route('user.index');
	}

}
