<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauHoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hois', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mamon');
            $table->string('noidung');
            $table->integer('type')->default(0)->comment('0 - Câu hỏi trắc nghiệm; 1 - Câu hỏi điền từ/chuyển câu; 2 - Câu hỏi tự luận');
            $table->json('cautraloi');
            $table->tinyInteger('dokho')->default(0);
            $table->unsignedBigInteger('ordering')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
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
        Schema::dropIfExists('cau_hois');
    }
}
