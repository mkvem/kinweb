<?php

namespace App\Http\Controllers;

use App\ShipmentList;
use App\Gudang;
use App\User;
use Illuminate\Http\Request;

class ShipmentListController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShipmentList  $shipmentList
     * @return \Illuminate\Http\Response
     */
    public function show(ShipmentList $shipmentList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShipmentList  $shipmentList
     * @return \Illuminate\Http\Response
     */
    public function edit(ShipmentList $shipmentList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShipmentList  $shipmentList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShipmentList $shipmentList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShipmentList  $shipmentList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShipmentList $shipmentList)
    {
        //
    }

    public function getAllinGudang($id, $imei){
        $user = User::where('imei', $imei)->first();
        if($user){
            $barang = ShipmentList::where('gudang_id',$id)->get();
            return json_encode($barang);
        }
        return response()->json(['error' => 'Pegawai tidak ditemukan!'], 404);
    }

    //Get Detail Barang
    public function getDetail($id, $barcode, $imei){
        $user = User::where('imei', $imei)->first();
        if($user){
            $barang = ShipmentList::where('gudang_id', $id)->where('data', 'like', '%'.$barcode."%")->first();
            if(sizeof($barang)==0){
                return response()->json(['error' => 'Data tidak ada!'], 204);
            }
            $status = $barang->status;
            $barang=$barang->data;
            $barang = json_decode($barang);
            if($status == 0)
                $barang->status = "Not Approved";
            else if($status == 1)
                $barang->status = "Approved";
            return json_encode($barang);
        }
        return response()->json(['error' => 'Pegawai tidak ditemukan!'], 404);
    }


    public function done($barcode, $imei){
        $user = User::where('imei', $imei)->first();
        if($user){
            $barang = ShipmentList::where('data', 'like', '%'.$barcode."%")->first();
            $barang->status = 1;
            $barang->save();
            return json_encode($barang);
        }
        return response()->json(['error' => 'Pegawai tidak ditemukan!'], 404);
    }

    public function search($id, $imei, $keyword=null){
        $user = User::where('imei', $imei)->first();
        if($user){
            $keyword = "%".$keyword."%";
            $barang = ShipmentList::where('gudang_id',$id)->where('data', 'like', $keyword);
            $barang = $barang->get();
            return json_encode($barang);
        }
        return response()->json(['error' => 'Pegawai tidak ditemukan!'], 404);
    }
}
