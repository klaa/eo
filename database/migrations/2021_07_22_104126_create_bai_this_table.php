<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiThisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_this', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahv');
            $table->unsignedBigInteger('mamon');
            $table->unsignedBigInteger('maqdt');
            $table->unsignedBigInteger('dethi_id');
            $table->json('cautraloi');
            $table->integer('diemthi')->nullable();
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
        Schema::dropIfExists('bai_this');
    }
}
