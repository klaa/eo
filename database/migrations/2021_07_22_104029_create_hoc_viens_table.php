<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_viens', function (Blueprint $table) {
            $table->id();
            $table->string('mshv')->unique()->nullable();
            $table->string('ho');
            $table->string('ten');
            $table->date('ngaysinh');
            $table->string('gioitinh')->nullable()->comment("1 - Nam; 2 - Nữ");
            $table->string('noisinh')->nullable();
            $table->tinyInteger('status')->default(0)->comment("0 - đã đăng ký, chưa theo học hay xét tuyển; 1 - là học viên; có qđ, mã hv, mã lớp; 2 - đã có qđ, mã hv chưa có mã lớp; 3 - đã bỏ học; 4 - đang bảo lưu;");
            $table->string('dantoc')->nullable();
            $table->string('vanbang')->nullable();
            $table->string('ma_so_vanbang')->nullable();
            $table->string('noicap')->nullable();
            $table->string('namtn')->nullable();
            $table->string('nganhhoc')->nullable();
            $table->string('cccd')->nullable();
            $table->string('sdt')->nullable();
            $table->string('email')->nullable();
            $table->string('dc_huyen')->nullable();
            $table->string('dc_tinh')->nullable();
            $table->tinyInteger('hedt')->default(1)->nullable()->comment('1 - Blended; 2 - ELearning');
            $table->unsignedBigInteger('malop')->nullable();
            $table->unsignedBigInteger('ma_qdtt')->nullable();
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
        Schema::dropIfExists('hoc_viens');
    }
}
