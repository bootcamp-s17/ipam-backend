<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

<<<<<<< HEAD
class CreateEquipmentsTable extends Migration //added an s 
=======
class CreateEquipmentsTable extends Migration
>>>>>>> 4a3247e2d7cb51cf96b7452ace1c4841ffe9f4e7
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
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('equipment_types');
            $table->string('model');
            $table->string('driver');
            $table->string('serial_number');
            $table->ipAddress('ip_address');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->string('host_name');
            $table->integer('port_number');
            $table->macAddress('mac_address');
            $table->boolean('mab');
            $table->ipAddress('printer_server');
            $table->string('printer_name');
            $table->string('share_name');
            $table->string('share_comment');
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
