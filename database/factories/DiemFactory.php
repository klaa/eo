<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Diem;
use App\HocVien;
use App\Mon;
use Faker\Generator as Faker;

$factory->define(Diem::class, function (Faker $faker) {
    $dcc = $faker->randomFloat(1,2,10);
    $dkt = $faker->randomFloat(1,2,10);
    $dt  = $faker->randomFloat(1,2,10);
    $dtk = ($dcc*0.1) + ($dkt*0.3) + ($dt*0.6);
    return [
        'mon_id' => Mon::all()->random()->id,
        'hv_id'  => HocVien::all()->random()->id,
        'diemcc' => $dcc,
        'diemkt' => $dkt,
        'diemthi' => $dt,
        'tongket' => $dtk,
    ];
});
