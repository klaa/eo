<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    protected $fillable = ['mshv','ho','ten','ngaysinh','noisinh','gioitinh','status','dantoc','vanbang','ma_so_vanbang','noicap','namtn','nganhhoc','cccd','sdt','email','dc_huyen','dc_tinh','hedt','malop','ma_qdtt'];
    public function lops() {
        return $this->belongsToMany(Lop::class,'hocvien_lop','hocvien_id','lop_id');
    }
    public function qdtt() {
        return $this->belongsTo(QuyetDinhTrungTuyen::class,'ma_qdtt');
    }
}
