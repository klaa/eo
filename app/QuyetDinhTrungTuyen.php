<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuyetDinhTrungTuyen extends Model
{
    protected $fillable = ['ten','ngayky'];
    public function hocvien() {
        return $this->hasMany(HocVien::class,'ma_qdtt');
    }
}
