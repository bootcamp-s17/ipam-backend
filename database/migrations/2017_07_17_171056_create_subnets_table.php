<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->ipAddress('subnet_address');
            $table->integer('mask_bits');
            $table->integer('vLan');
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
        Schema::dropIfExists('subnets');
    }
}
