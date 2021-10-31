<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaDiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diadiems = [
            ['Trường Trung cấp Công đồng Hà Nội - Phân Hiệu Lạng Sơn', 'Trung tâm GDNN-GDTX Văn Quan Lạng Sơn', 'Phố Tân Xuân - Thị xã Văn Quan - Lạng Sơn'],
            ['Trung tâm GDTX số 2 Nghệ An', 'Trung tâm GDTX số 2 Nghệ An', 'Đường Bình Minh - TX Cửa Lò - Nghệ An'],
            ['Trung tâm GDTX số 2 Nghệ An', 'Trung tâm GDNN-GDTX Yên Thành - Nghệ An', 'Khối 1- Thị Trấn Yên Thành - Nghệ An'],
            ['Trường Trung cấp KTTN & Môi trường', 'Trường Trung cấp KTTN & Môi trường', 'Nhà E, Trường Đại học Sân khấu điện ảnh, Mai Dịch, Cầu Giấy , Hà Nội'],
            ['Trường Đại học Công nghệ Giao thông Vận tải', 'Trường Đại học Công nghệ Giao thông Vận tải', 'Số 54 - Phố Triều Khúc - Phường Thanh Xuân Nam - Quận Thanh Xuân - TP Hà Nội'],
            ['Trường Đại học Thành Đông - Hải Dương', 'Trường Đại học Thủ Đô Hà Nội', 'Phòng 405, Nhà E, Làng sinh viên HACINCO, 79, Ngụy Như, Kom Tum, Thanh Xuân, Hà Nội'],
            ['Trường Trung cấp Future Việt Nam', 'Trường Trung cấp Future Việt Nam', 'Tầng 5- Tòa Viện Âm Nhạc, Đường Mễ Trì, Nam Từ Liêm, Hà Nội'],
            ['Trường Đại học Kinh tế Nghệ An', 'Trường Đại học Kinh tế Nghệ An', '51, Lý Tự Trọng, TP Vinh, Nghệ An'],
            ['Trường Trung cấp KT-KT Bắc Thăng Long', 'Học viện khoa học Hàn Lâm', 'Ngõ 475, Nguyễn Trãi, Thanh Xuân, Hà Nội'],
            ['Trường Trung cấp KT-KT Bắc Thăng Long', 'Trường Trung cấp KT-KT Bắc Thăng Long', 'Đường Kim Chung, Kim Chung, Đông Anh, Hà Nội'],
            ['Trường Cao đẳng Kinh tế - Kỹ thuật Lâm Đồng', 'Trường Cao đẳng Kinh tế - Kỹ thuật Lâm Đồng', 'Số 39 - Trần Phú - Phường 4 - Đà Lạt - Lâm Đồng'],
            ['Trường Trung cấp kỹ thuật Đa ngành Hà Nội', 'Trường Trung cấp kỹ thuật Đa ngành Hà Nội', '58 Nguyễn Chí Thanh, P Láng Thượng, Q. Đống Đa, HN'],
            ['Trung tâm Bồi dưỡng nghiệp vụ sư phạm và GDTX Hà Tĩnh', 'Trung tâm Bồi dưỡng nghiệp vụ sư phạm và GDTX Hà Tĩnh', 'Số 52 Lê Hồng Phong, Phường Thạch Linh, Tp Hà Tĩnh'],
            ['Trường Cao đẳng Bình Minh Sài Gòn' , 'Trường Cao đẳng Bình Minh Sài Gòn', '424 (15K- Địa chỉ số cũ) Phan Văn Trị , P 7, Quận Gò Vấp, TP Hồ Chí Minh'],
            ['Trường Trung cấp KT- KT Hà Nội 1', 'Trường Trung cấp KT- KT Hà Nội 1', 'Số 54-Vũ Trọng Phụng - Thanh Xuân - Hà Nội'],
            ['Trường Trung cấp Đa ngành Hà Nội', 'Trường Trung cấp Đa ngành Hà Nội', '40 Trần Cung, Phường Cổ Nhuế 1, Quận Bắc Từ Liên, TP Hà Nội'],
            ['Trường Trung cấp Tổng hợp Sài Gòn', 'Trường TC Tổng hợp Sài Gòn' , 'Viện Đào tạo và Nâng cao TPHCM -Số 2 Mai Thị Lựu, phường Đa Kao, quận 1, TPHCM'],
            ['Trường Cao đẳng Công Thương Việt Nam', 'Trường Cao đẳng Công thương Việt Nam', 'Tòa nhà An & Huy, Khu công nghiệp Ngọc Hồi, Thanh Trì, TP Hà Nội'],
            ['Trường Trung cấp Nghề Điều Dưỡng', 'Trường Trung cấp Nghề Điều Dưỡng', 'Tầng 4, số 4 ngõ 3 phố Tôn Thất Thuyết - Phường Dịch Vọng Hậu - Quận Cầu Giấy - TP Hà Nội'],
            ['Trường ĐH Lâm Nghiệp Hà Nội', 'Trường Đại học Lâm Nghiệp', 'QL21, TT. Xuân Mai, Chương Mỹ, Hà Nội'],
            ['Trường Cao đẳng Kinh tế Kỹ thuật và Công nghệ', 'Trường Cao đẳng Kinh tế Kỹ thuật và Công nghệ', 'Cơ sở đào tạo số 2: L28-M02, KĐT Dương Nội, P. Dương Nội. Q. Hà Đông, TP. Hà Nội.'],
        ];
        foreach($diadiems as $diadiem) 
            DB::insert('insert into dia_diems (dd_phaply, dd_datlop, diachi) values (?, ?, ?)', $diadiem);
    }
}
