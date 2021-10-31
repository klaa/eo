<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NganhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nganhs = [
            ['Luật','7380101','1'],
            ['Kế toán','7340301','3'],
            ['Thông tin thư viện','7320201','1'],
            ['Quản lý đất đai','7850103','1'],
            ['Ngôn ngữ Anh','7220201','3'],
            ['Luật kinh tế','7380107','2'],
            ['Quản trị kinh doanh','7340101','2'],
            ['Tài chính ngân hàng','7340201','2'],
            ['Công nghệ thông tin','7480201','2'],
            ['Kỹ thuật Điện tử - Viễn thông','7520207','2'],
            ['Thương mại điện tử','7340122','2'],
        ];
        foreach($nganhs as $nganh)
            DB::insert('insert into nganhs (tennganh,manganh,hedt) values (?,?,?)',$nganh);
    }
}
