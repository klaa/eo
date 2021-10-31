<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert(['name'=>'Super User','alias'=>'super-user']);
        DB::table('groups')->insert(['name'=>'Administrator','alias'=>'administrator']);
        DB::table('groups')->insert(['name'=>'Giám thị','alias'=>'giam-thi']);
        DB::table('groups')->insert(['name'=>'Giảng viên chấm bài','alias'=>'giang-vien-cham-bai']);
        DB::table('groups')->insert(['name'=>'Giảng viên vấn đáp','alias'=>'giang-vien-van-dap']);
    }
}
