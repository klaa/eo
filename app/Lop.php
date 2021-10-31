<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $fillable = ['ten','hedt','nganh_id'];
    public function hocviens() {
        return $this->belongsToMany(HocVien::class,'hocvien_lop','lop_id','hocvien_id');
    }
}
