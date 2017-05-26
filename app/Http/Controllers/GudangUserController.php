<?php

namespace App\Http\Controllers;

use App\Gudang_user;
use App\Gudang;
use App\User;
use App\ShipmentList;
use Illuminate\Http\Request;

class GudangUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $gudanguser = new Gudang_user;
        $user = User::find($request->user_id);
        $user->gudangs()->attach($request->gudangs);
        $user->save();
        $request->session()->flash('toast', 'User berhasil diupdate!');
        $request->session()->flash('status', 'success'); 
        return redirect()->route('users.show', ['id' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gudang_user  $gudang_user
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang_user $gudang_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gudang_user  $gudang_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang_user $gudang_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gudang_user  $gudang_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang_user $gudang_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gudang_user  $gudang_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Gudang_user $gudang_user)
    {
        $user = User::find($request->user_id);
        $user->gudangs()->detach($request->gudang_id);
        $request->session()->flash('toast', 'User berhasil diupdate!');
        $request->session()->flash('status', 'success'); 
        return redirect()->route('users.show', ['id' => $request->user_id]);
    }

    public function getGudang(Request $request, $status, $imei){
        $user = User::where('imei', $imei)->first();
        if($status == "masuk"){
            $list_gudang = ShipmentList::where('status', 0)->pluck('gudang_id');
            $gudang = Gudang::all()->whereIn('id',Gudang_user::where('user_id', $user->id)->whereIn('gudang_id', $list_gudang)->pluck('gudang_id'));
        }
        else{

        }
        return json_encode($gudang);
        // return response()->json(['error' => ''], 404);
    }
}
