<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HocvienLop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocvien_lop', function (Blueprint $table) {
            $table->unsignedBigInteger('hocvien_id');
            $table->unsignedBigInteger('lop_id');
            $table->primary(['hocvien_id','lop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hocvien_lop');
    }
}
