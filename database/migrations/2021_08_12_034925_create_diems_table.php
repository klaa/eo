<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->unsignedBigInteger('mon_id');
            $table->unsignedBigInteger('hv_id');
            $table->float('diemcc',3,1,true)->nullable();
            $table->float('diemkt',3,1,true)->nullable();
            $table->float('diemthi',3,1,true)->nullable();
            $table->float('tongket',3,1,true)->nullable();
            $table->date('ngaythi')->nullable();
            $table->string('ghichu')->nullable();
            $table->float('diemcc2',3,1,true)->nullable();
            $table->float('diemkt2',3,1,true)->nullable();
            $table->float('diemthi2',3,1,true)->nullable();
            $table->float('tongket2',3,1,true)->nullable();
            $table->date('ngaythi2')->nullable();
            $table->string('ghichu2')->nullable();
            $table->unsignedBigInteger('last_modified_by')->nullable();
            $table->timestamps();
            $table->primary(['mon_id','hv_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diems');
    }
}
