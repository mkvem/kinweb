<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0);
            $table->text('data');
            $table->integer('gudang_id')->unsigned();
            $table->timestamps();

            $table->foreign('gudang_id')->references('id')->on('gudangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment_lists');
    }
}
