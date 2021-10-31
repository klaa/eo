<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $fillable = ['mon_id','hv_id','diemcc','diemcc2','diemkt','diemkt2','diemthi','diemthi2','tongket','tongket2','ngaythi','ngaythi2','last_modified_by'];
    protected $with     = ['hocvien'];
    public function hocvien() {
        return $this->belongsTo(HocVien::class,'hv_id');
    }
}
