<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeThiCauHoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dethi_cauhoi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dethi_id');
            $table->unsignedBigInteger('cauhoi_id');
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
        Schema::dropIfExists('dethi_cauhoi');
    }
}
