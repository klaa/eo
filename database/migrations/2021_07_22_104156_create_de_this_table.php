<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeThisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('de_this', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maqdthi');
            $table->tinyInteger('hedaotao')->default(1)->comment("1 - Hệ kết hợp trực tuyến và trực tiếp; 2 - E-Learning");
            $table->string('madethi');
            $table->unsignedBigInteger('mamon');
            $table->dateTime('tg_batdau');
            $table->dateTime('tg_ketthuc');
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
        Schema::dropIfExists('de_this');
    }
}
