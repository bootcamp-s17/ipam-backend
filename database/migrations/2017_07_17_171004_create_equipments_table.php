<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateEquipmentsTable extends Migration //added an s 


{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adding columns to equipment table
        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('equipment_type_id')->unsigned();
            $table->foreign('equipment_type_id')->references('id')->on('equipment_types');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->string('model')->nullable();
            $table->string('driver')->nullable();
            $table->string('serial_number')->nullable();
            $table->ipAddress('ip_address');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->string('host_name')->nullable();
            $table->integer('port_number')->nullable();
            $table->macAddress('mac_address');
            $table->boolean('mab');
            $table->string('printer_server')->nullable();
            $table->string('printer_name')->nullable();
            $table->string('share_name')->nullable();
            $table->string('share_comment')->nullable();
            // $table->integer('note_id')->unsigned();
            // $table->foreign('note_id')->refereces('id')->on('notes');
            $table->softDeletes();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
