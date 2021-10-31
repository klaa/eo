<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuyetDinhThisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyet_dinh_this', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->date('ngayqd')->nullable();
            //ID dia diem thi
            $table->unsignedBigInteger('ddt_id')->nullable();
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->json('hoidong')->nullable();
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
        Schema::dropIfExists('quyet_dinh_this');
    }
}
