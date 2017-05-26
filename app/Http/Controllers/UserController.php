<?php

namespace App\Http\Controllers;

use App\User;
use App\Gudang_user;
use App\Gudang;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all()->where('approve', 1);
        $users_notapprove = User::all()->where('approve', 0);
        return view('users.index')->with('users', $users)->with('users_notapprove', $users_notapprove)->with('nama', 'admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = new User;
        return view('users.form')->with('user', $user)->with('nama', 'admin');
    }

    //API
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request->name;
        $user = new User;
        $user->fill($request->all());
        $user->save();
        $res = [
        'name' => $user->name,
        'imei' => $user->imei,
        'timestamp' => $user->created_at
        ];
        return json_encode($res);
        return response()->json(['error' => ''], 404);

        // $request->session()->flash('toast', 'User berhasil ditambahkan!');
        // $request->session()->flash('status', 'success'); 
        // return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $user = User::find($user->id);
        $gudanguser = new Gudang_user;
        $gudangs = Gudang::all()->pluck('name', 'id');
        return view('users.detail')->with('user', $user)->with('gudangs', $gudangs)->with('gudanguser', $gudanguser)->with('nama', 'admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        //delete user
        $user->delete();
        $request->session()->flash('toast', 'User berhasil dihapus!');
        $request->session()->flash('status', 'success'); 
        return redirect()->route('users.index');
    }

    /**
    * Approve user id
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function approve(User $user){
        //Approve user id
        $user->approve = 1;
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Disapprove user id.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function disapprove(User $user)
    {
        //disapprove user
        $user->approve = 0;
        $user->save();
        return redirect()->route('users.index');
    }

    public function create_user(Request $request){
        $data = $request->all();
        $user = User::where('imei', $request->imei)->first();
        if($user ==null){
            $user = new User;
            $user->fill($data);
            $user->save();
            $user->approve = 0;
        }
        $res = [
        'name' => $user->name,
        'imei' => $user->imei,
        'timestamp' => $user->created_at,
        'approve' => $user->approve
        ];
        return json_encode($res);
        // return response()->json(['error' => ''], 404);
    }
}
