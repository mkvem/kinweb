<?php

use Illuminate\Database\Seeder;

class ShipmentListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shipment_lists')->insert([
            'data' => '{ "id": "1234522331", "nama": "Barang A", "berat": "200kg", "desc": "Deksripsi barang A. Lorem ipsum kasdlasdjlas" }',
            'gudang_id' => '1'
        ]);
        DB::table('shipment_lists')->insert([
            'data' => '{ "id": "1234378282", "nama": "Barang B", "berat": "100kg", "desc": "Deksripsi barang B. Lorem ipsum kasdlasdjlas" }',
            'gudang_id' => '2'
        ]);
        DB::table('shipment_lists')->insert([
            'data' => '{ "id": "7378422331", "nama": "Barang C", "berat": "10000kg", "desc": "Deksripsi barang C. Lorem ipsum kasdlasdjlas" }',
            'gudang_id' => '1'
        ]);
    }
}
