<?php

use Illuminate\Database\Seeder;

class GudangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('gudangs')->insert([
            'name' => 'Gudang A',
            'code' => 'GBBLOT'
        ]);
        DB::table('gudangs')->insert([
            'name' => 'Gudang B',
            'code' => 'GBBLOT2'
        ]);
    }
}
