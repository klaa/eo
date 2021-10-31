<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lops = [
            ['K2 THƯ VIỆN',1],
            ['K2A NGÔN NGỮ ANH',1],
            ['K2B NGÔN NGỮ ANH',1],
            ['K3 NGÔN NGỮ ANH',1],
            ['K3 THƯ VIỆN',1],
            ['K5A NGÔN NGỮ ANH',1],
            ['K4 NGÔN NGỮ ANH',1],
            ['K6A NGÔN NGỮ ANH',1],
            ['K5B NGÔN NGỮ ANH',1],
            ['K6B NGÔN NGỮ ANH',1],
            ['K7 NGÔN NGỮ ANH',1],
            ['K8 NGÔN NGỮ ANH',1],
            ['K9A NGÔN NGỮ ANH',1],
            ['K9B NGÔN NGỮ ANH',1],
            ['K9C NGÔN NGỮ ANH',1],
            ['K10 NGÔN NGỮ ANH',1],
            ['K11 NGÔN NGỮ ANH',1],
            ['K12 NGÔN NGỮ ANH',1],
            ['K13 NGÔN NGỮ ANH',1],
            ['K14 NGÔN NGỮ ANH',1],
            ['K15 NGÔN NGỮ ANH',1],
            ['K16 NGÔN NGỮ ANH',1],
            ['K17 NGÔN NGỮ ANH',1],
            ['K18A NGÔN NGỮ ANH',1],
            ['K18B NGÔN NGỮ ANH',1],
            ['K19 NGÔN NGỮ ANH',1],
            ['K20A NGÔN NGỮ ANH',1],
            ['K20B NGÔN NGỮ ANH',1],
            ['K21 NGÔN NGỮ ANH',1],
            ['K22 NGÔN NGỮ ANH',1],
            ['K23A NGÔN NGỮ ANH',1],
            ['K23B NGÔN NGỮ ANH',1],
            ['K24 NGÔN NGỮ ANH',1],
            ['K25 NGÔN NGỮ ANH',1],
            ['K26 NGÔN NGỮ ANH',1],
            ['K27 NGÔN NGỮ ANH',1],
            ['K28 NGÔN NGỮ ANH',1],
            ['K29 NGÔN NGỮ ANH',1],
            ['K30 NGÔN NGỮ ANH',1],
            ['K31A NGÔN NGỮ ANH',1],
            ['K32 NGÔN NGỮ ANH',1],
            ['K33 NGÔN NGỮ ANH',1],
            ['K34 NGÔN NGỮ ANH',1],
            ['K35 NGÔN NGỮ ANH',1],
            ['K36 NGÔN NGỮ ANH',1],
            ['K37 NGÔN NGỮ ANH',1],
            ['K38 NGÔN NGỮ ANH',1],
            ['K39 NGÔN NGỮ ANH',1],
        ];
        foreach($lops as $lop)
            DB::insert('insert into lops (ten,hedt) values (?,?)',$lop);
    }
}