<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mons', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('mamon')->unique();
            $table->integer('so_tin_chi');
            $table->integer('ti_le_diem_thi')->default(60);
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
        Schema::dropIfExists('mons');
    }
}
