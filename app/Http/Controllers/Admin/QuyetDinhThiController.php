<?php

namespace App\Http\Controllers\Admin;

use App\QuyetDinhThi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class QuyetDinhThiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuyetDinhThi  $quyetDinhThi
     * @return \Illuminate\Http\Response
     */
    public function show(QuyetDinhThi $quyetDinhThi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuyetDinhThi  $quyetDinhThi
     * @return \Illuminate\Http\Response
     */
    public function edit(QuyetDinhThi $quyetDinhThi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuyetDinhThi  $quyetDinhThi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuyetDinhThi $quyetDinhThi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuyetDinhThi  $quyetDinhThi
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuyetDinhThi $quyetDinhThi)
    {
        //
    }

    /**
     * Xet DKDT form
     */
    public function xetDkdtForm() {
        $dsm = ['PSST113'=>'Nhập môn Internet và E-learning','PSST114'=>'Phát triển kỹ năng cá nhân','MANT209'=>'Quản trị tài chính','ACCT214'=>'Kế toán tài chính 1','LAWT240'=>'Luật kinh tế','FINT212'=>'Ngân hàng thương mại','ACCT219'=>'Kế toán công','ACCT222'=>'Kiểm toán tài chính','ACCT223'=>'Kế toán máy','ACCT227'=>'Kế toán thuế','ACCT216'=>'Kế toán tài chính 2','ACCT217'=>'Tổ chức công tác kế toán','MANT220'=>'Phân tích hoạt động kinh doanh','ACCT221'=>'Phân tích báo cáo tài chính','FINT228'=>'Tài chính công','FINT204'=>'Lý thuyết tài chính tiền tệ','ACCT203'=>'Nguyên lý kế toán','MANT213'=>'Quản trị chiến lược','ACCT218'=>'Kế toán quản trị','ACCT215'=>'Kiểm toán căn bản','ACCT226'=>'Hệ thống thông tin kế toán','ACCT229'=>'Kiểm toán nội bộ','ECOT201'=>'Kinh tế vi mô','ECOT202'=>'Kinh tế vĩ mô','FINT211'=>'Tài chính doanh nghiệp','ACCT208'=>'Thuế','ACCT224'=>'Kế toán thương mại dịch vụ','ACCT225'=>'Kế toán ngân hàng','MANT217'=>'Quản trị kinh doanh','ECOT205'=>'Nguyên lý thống kê kinh tế','PSST206'=>'Marketing căn bản','PSST102'=>'Kinh tế chính trị Mác-Lênin','PSST104'=>'Tư tưởng Hồ Chí Minh','PSST105'=>'Lịch sử Đảng cộng sản Việt Nam','LAWT108'=>'Pháp luật đại cương','ENGT109'=>'Tiếng anh cơ bản 1','PSST112'=>'Tin học đại cương','ENGT110'=>'Tiếng anh cơ bản 2','ENGT111'=>'Tiếng anh cơ bản 3','PSST101'=>'Triết học Mác-Lênin','MANT207'=>'Quản trị sản xuất','MANT221'=>'Quản trị nguồn nhân lực','PSST103'=>'Chủ nghĩa xã hội khoa học','PSST205'=>'Lý luận Nhà nước và pháp luật 2','LAWT228'=>'Luật cạnh tranh','LAWT208'=>'Luật dân sự 1','LAWT211'=>'Luật tố tụng hình sự','LAWT216'=>'Tư pháp quốc tế','LAWT212'=>'Luật tố tụng dân sự','LAWT222'=>'Luật thương mại 1','LAWT223'=>'Luật lao động','LAWT224'=>'Luật ngân hàng','LAWT225'=>'Luật đất đai','LAWT226'=>'Luật môi trường','LAWT230'=>'Luật sở hữu trí tuệ','LAWT231'=>'Luật đầu tư','LAWT232'=>'Luật tài chính công','LAWT235'=>'Luật an sinh xã hội','PSST204'=>'Lý luận Nhà nước và pháp luật 1','LAWT206'=>'Luật hiến pháp','LAWT207'=>'Luật hành chính','LAWT213'=>'Luật tố tụng hành chính','LAWT227'=>'Luật thương mại 2','LAWT229'=>'Pháp luật thị trường chứng khoán','LAWT237'=>'Kỹ năng tư vấn pháp luật','LAWT214'=>'Luật hôn nhân và gia đình','LAWT209'=>'Luật hình sự','LAWT210'=>'Luật dân sự 2','LAWT215'=>'Công pháp quốc tế','LAWT233'=>'Pháp luật tài chính doanh nghiệp','LAWT234'=>'Pháp luật đấu thầu','MANT222'=>'Đạo đức kinh doanh và văn hóa doanh nghiệp','MANT224'=>'Quản trị hành chính văn phòng','MANT226'=>'Quản trị Marketing','MANT227'=>'Quản trị rủi ro','MANT228'=>'Khởi sự kinh doanh','MANT229'=>'Khởi tạo và Tái lập doanh nghiệp','MANT231'=>'Kỹ năng quản trị','MANT234'=>'Quản trị kinh doanh thương mại','MANT223'=>'Tâm lý học quản trị kinh doanh','MANT225'=>'Quản trị dự án','MANT230'=>'Quản trị chi phí kinh doanh','MANT235'=>'Kinh doanh quốc tế','LAWT241'=>'Pháp luật kinh doanh','MANT232'=>'Thống kê kinh doanh','MANT233'=>'Quản trị thương hiệu','MATT107'=>'Lý thuyết xác suất và thống kê toán','MANT201'=>'Quản trị học','PSST218'=>'Thương mại điện tử','INTT202'=>'Nhập môn hệ điều hành','INTT206'=>'Cấu trúc dữ liệu và giải thuật','INTT204'=>'Lập trình hướng đối tượng','INTT203'=>'Cơ sở dữ liệu','INTT207'=>'Cơ bản về mạng máy tính','INTT212'=>'Phân tích và thiết kế hệ thống thông tin','INTT211'=>'Kiến trúc ứng dụng trong doanh nghiệp','INTT217'=>'Lập trình mã nguồn mở PHP & MySQL','INTT216'=>'Quản lý chất lượng phần mềm','INTT218'=>'Lập trình ứng dụng','INTT219'=>'Công nghệ phần mềm ứng dụng','INTT220'=>'Phát triển ứng dụng Web với Java','INTT225'=>'Quản lý dự án phần mềm','MATT205'=>'Toán rời rạc','INTT209'=>'Lập trình ứng dụng cho máy tính cá nhân C#','INTT213'=>'Lập trình Web','INTT227'=>'An ninh mạng','MANT240'=>'Hệ thống thông tin quản lý','INTT215'=>'Hệ quản trị cơ sở dữ liệu SQL server','INTT221'=>'Lập trình thiết bị di động','INTT223'=>'Các hệ quản trị CSDL hiện đại','INTT201'=>'Nhập môn lập trình ©','INTT208'=>'Kỹ thuật đồ họa','INTT222'=>'Lập trình ứng dụng (phát triển ứng dụng Client/Server dựa trên mô hình MVC)','INTT210'=>'Kỹ thuật xây dựng Web','INTT214'=>'Tương tác giữa người sử dụng và ứng dụng','INTT224'=>'Hệ thống thông tin địa lý','MATT106'=>'Toán cao cấp','ECOT203'=>'Kinh tế lượng','FINT209'=>'Tài chính quốc tế','FINT210'=>'Thị trường chứng khoán','FINT230'=>'Thanh toán quốc tế','FINT231'=>'Marketing ngân hàng','FINT232'=>'Mua bán, sáp nhập và hợp nhất doanh nghiệp','FINT233'=>'Phân tích và đầu tư chứng khoán','FINT229'=>'Quản trị ngân hàng thương mại','FRET101'=>'Tiếng Pháp 1','ENGT203'=>'Khẩu ngữ tiếng Anh trung cấp 1','ENGT204'=>'Bút ngữ tiếng Anh trung cấp 1','FRET102'=>'Tiếng Pháp 2','ENGT214'=>'Luyện âm tiếng Anh','ENGT206'=>'Khẩu ngữ tiếng Anh trung cấp 2','ENGT207'=>'Bút ngữ tiếng Anh trung cấp 2','ENGT208'=>'Khẩu ngữ tiếng Anh trung cấp 3','ENGT209'=>'Bút ngữ tiếng Anh trung cấp 3','ENGT219'=>'Ngữ pháp tiếng Anh','ENGT210'=>'Khẩu ngữ tiếng Anh cao cấp 1','ENGT211'=>'Bút ngữ tiếng Anh cao cấp 1','ENGT212'=>'Khẩu ngữ tiếng Anh cao cấp 2','ENGT216'=>'Bút ngữ tiếng Anh cao cấp 2','ENGT218'=>'Dịch tiếng Anh','ENGT223'=>'Biên dịch tiếng Anh','ENGT224'=>'Phiên dịch tiếng Anh 1','ENGT226'=>'Dịch thuật du lịch','ENGT225'=>'Phiên dịch tiếng Anh 2','ENGT228'=>'Tiếng Anh du lịch khách sạn','PSST106'=>'Dẫn luận ngôn ngữ','PSST107'=>'Tiếng việt','PSST201'=>'Văn hóa Việt Nam','PSST202'=>'Phân tích văn bản tiếng việt','ENGT213'=>'Đất nước học Anh - Mỹ','ENGT215'=>'Ngữ âm học tiếng Anh','ENGT217'=>'Khẩu ngữ tiếng Anh cao cấp 3','ENGT220'=>'Bút ngữ tiếng Anh cao cấp 3','ENGT221'=>'Ngôn ngữ học đối chiếu','ENGT227'=>'Tiếng Anh giao tiếp kinh doanh','ENGT229'=>'Tiếng Anh thương mại','PSST108'=>'Kỹ thuật lập trình','ELTT303'=>'Xử lý tín hiệu số','ELTT306'=>'Cơ sở lý thuyết mạch và tín hiệu','ELTT307'=>'Kỹ thuật điện tử số','ELTT308'=>'Kỹ thuật mạch điện tử','ELTT309'=>'Lý thuyết điều khiển tự động','ELTT310'=>'Vi xử lý-vi điều khiển','ELTT311'=>'Lý thuyết thông tin và mã hóa','ELTT312'=>'Hệ thống nhúng','ELTT313'=>'Trường điện từ, truyền sóng và anten','ELTT314'=>'Cơ sở thông tin số','ELTT315'=>'Nguồn điện trong hệ thống điện tử - viễn thông','ELTT316'=>'Kỹ thuật truyền dẫn','ELTT317'=>'Kỹ thuật thiết kế bo mạch','ELTT318'=>'Cơ sở mô phỏng viễn thông','ELTT319'=>'Thông tin vô tuyến','ELTT321'=>'Kỹ thuật truyền hình','ELTT322'=>'Công nghệ IoT','ELTT323'=>'Thông tin di động','ELTT324'=>'Hệ thống viễn thông','ELTT325'=>'Thông tin quang ','ELTT326'=>'Các công nghệ mới','ELTT327'=>'Thiết bị đầu cuối viễn thông','ELTT328'=>'Mạng cảm biến','ELTT302'=>'Kỹ thuật điện tử tương tự','ELTT320'=>'Kỹ thuật chuyển mạch và tổng đài','EDMT404'=>'Marketing số ','EDMT405'=>'Lập trình cơ sở','EDMT406'=>'Hành vi người tiêu dùng','EDMT409'=>'Thiết kế website thương mại','EDMT413'=>'Thương mại di động','EDMT416'=>'Kỹ thuật xử lý và dựng video','EDMT417'=>'Thanh toán điện tử','EDMT419'=>'Content marketing','EDMT422'=>'Tối ưu hóa công cụ tìm kiếm','EDMT401'=>'Pháp luật thương mại điện tử','EDMT402'=>'Nghiên cứu Marketing','EDMT412'=>'Quản trị quan hệ khách hàng','EDMT418'=>'Quản trị chiến lược kinh doanh điện tử','EDMT420'=>'Quản trị bán hàng đa kênh','EDMT421'=>'Marketing hỗn hợp','EDMT403'=>'Phương pháp nghiên cứu khoa học trong kinh tế-xã hội','EDMT407'=>'Mạng và truyền thông','EDMT408'=>'Marketing quốc tế','EDMT410'=>'Chính phủ điện tử','EDMT411'=>'Quản trị cơ sở dữ liệu','EDMT414'=>'Phát triển hệ thống thông tin kinh tế','EDMT415'=>'Khai thác dữ liệu phục vụ kinh doanh','ELTT305'=>'Cơ sở lý thuyết mạch điện 1','MATT115'=>'Đại số tuyến tính','PHYT117'=>'Vật lý đại cương','MATT116'=>'Toán giải tích','ELTT301'=>'Hình họa và Vẽ kỹ thuật ','ELTT304'=>'Kỹ thuật đo lường điện'];
        // dd($dsm);
        return view('admin.qdt.xetdkdt', compact('dsm'));
    }

    /**
     * Lay ds hoc vien
     */
    public function layDsHv(Request $request) {
        $ds = $request->get('data');
        $mm = $request->get('mamon');
        $hvs = DB::table('hoc_viens')->join('hocvien_lop','hoc_viens.id','=','hocvien_lop.hocvien_id')
                                ->join('lops','hocvien_lop.lop_id','=','lops.id')
                                ->select('hoc_viens.*','lops.ten as tenlop',DB::raw('SUBSTR(lops.ten,8,2) as diadiem'))
                                ->whereIn('lops.ten',$ds)
                                ->orderBy('diadiem','desc')
                                ->orderBy('tenlop')
                                ->orderBy('ten')
                                ->orderBy('ho')
                                ->get();
        // dd($hvs);
        $requestData = array();
        $requestData['ma_mon']    = $mm;
        $requestData['dshv']      = $hvs->pluck('mshv')->all();
        $e = $this->getAumData(json_encode($requestData));
        $data['request'] = $requestData;
        $data['response'] = $e;
        // return  json_encode ($data);
        foreach ($hvs as $k => $tnu) {
            $tnu->xetdkdt = 0;
            $tnu->dcc = 0;
            $tnu->dkt  = 0;
            foreach($e->ketqua as $l => $aum) {
                if($tnu->mshv == $aum->mhv) {
                    $tnu->xetdkdt = $aum->xetdkdt;
                    $tnu->dcc = str_replace(".",",",$aum->dcc);
                    $tnu->dkt  = str_replace(".",",",$aum->dkt);
                    $tnu->aum_xet = $aum->xetdkdt;
                }
            }    
        }
        return json_encode($hvs);
    }
    
    /**
     * cUrl sang AUM
     */
    public function getAumData($requestData) {
        $curl = curl_init('https://tnu.aum.edu.vn/webservice/restful/server.php/tnuapi_xet_dkdt');

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $requestData);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: 13effa25a98b9e73fa7b69e0faf36809',
            'Content-Length: ' . strlen($requestData))
        );

        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }
}
