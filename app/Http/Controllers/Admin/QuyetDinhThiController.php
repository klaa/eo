<?php

namespace App\Http\Controllers\Admin;

use App\QuyetDinhThi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mon;
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
        $dsm = Mon::all();
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
