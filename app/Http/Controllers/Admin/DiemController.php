<?php

namespace App\Http\Controllers\Admin;

use App\Diem;
use App\HocVien;
use App\Http\Controllers\Controller;
use App\Lop;
use App\Mon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function show(Diem $diem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function edit(Diem $diem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diem $diem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diem  $diem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diem $diem)
    {
        //
    }

    /**
     * Nhập điểm điều kiện theo lớp
     *
     * @param   string   aParam  Param
     *
     * @return  void
     */
    public function nhapdiem()
    {
        $lops = Lop::where('hedt',1)->get();
        $mons = Mon::get();
        return view('admin.diems.nhapdiem',compact('lops','mons'));
    }

    public function prepareData($v,$mshv,$mon,$solan=1) {
        $rs = [];
        $rs['hv_id'] = $mshv;
        $rs['mon_id'] = $mon;
        if($solan==2) {
            $rs['diemcc2'] = $v['diemcc'];
            $rs['diemkt2'] = $v['diemkt'];
            $rs['diemthi2'] = $v['diemthi'];
            $rs['ghichu2'] = $v['ghichu'];
        }else{
            $rs['diemcc'] = $v['diemcc'];
            $rs['diemkt'] = $v['diemkt'];
            $rs['diemthi'] = $v['diemthi'];
            $rs['ghichu'] = $v['ghichu'];
        }
        return $rs;
    }

    /**
     * Thực hiện nhập điểm
     */
    public function performNhapdiem(Request $request)
    {
        $validated = $request->validate([
            'mon' => 'numeric',
            'lanthi' => 'numeric',
            'hv.*.mshv' => 'required',
            'hv.*.diemcc' => ['nullable','numeric'],
            'hv.*.diemkt' => ['nullable','numeric'],
            'hv.*.diemthi' => ['nullable','numeric'],
            'hv.*.ghichu' => 'nullable',
        ]);
        // dd($validated);
        $dtSuccess = [];
        $errArr = [];
        foreach($validated['hv'] as $k=>$v) {
            if($hv = HocVien::where('mshv',$v['mshv'])->first()) {
                $diemData = $this->prepareData($v,$hv->id,$validated['mon'],$validated['lanthi']);
                if(is_null($v['diemthi'])) {
                    if(!is_null($v['diemcc']) && !is_null($v['diemkt'])) {
                        $tmp = Diem::updateOrCreate(['hv_id'=>$hv->id,'mon_id'=>$validated['mon']],$diemData);
                    }elseif(is_null($v['diemcc']) && is_null($v['diemkt'])) {
                        //Không làm gì nếu tất cả cùng null.    
                    }else{
                        $errArr[] = 'Cần phải nhập đủ điểm chuyên cần và kiểm tra cho học viên '.$hv->ho.' '.$hv->ten.'!';
                    }
                }else{
                    if(is_null($v['diemcc']) && is_null($v['diemkt'])) {
                        $tmp = Diem::updateOrCreate(['hv_id'=>$hv->id,'mon_id'=>$validated['mon']],$diemData);    
                    }elseif(!is_null($v['diemcc']) && is_null($v['diemkt'])) {
                        $errArr[] = 'Cần phải nhập điểm kiểm tra cho học viên '.$hv->ho.' '.$hv->ten.'!';   
                    }elseif(is_null($v['diemcc']) && !is_null($v['diemkt'])) {
                        $errArr[] = 'Cần phải nhập điểm chuyên cần cho học viên '.$hv->ho.' '.$hv->ten.'!';
                    }else{
                        $tmp = Diem::updateOrCreate(['hv_id'=>$hv->id,'mon_id'=>$validated['mon']],$diemData);   
                    }
                }
                if($tmp) {
                    $dtSuccess[] = 'Cập nhật điểm thành công cho học viên ' . $hv->ho.' '.$hv->ten;
                }
            }else{
                $errArr[] = 'Không tìm thấy học viên có mã số '.$v['mshv'];
            }
        }
            return redirect()->route('admin.diems.nhapdiem')->withErrors($errArr)->withSuccesss($dtSuccess);
    }

    /**
     * Nhập điểm thi theo lớp
     */
    public function tracuudiem()
    {
        return view('admin.diems.tracuudiem');
    }

    /**
     * lấy danh sách điểm theo mshv học viên khi đã có mã môn rồi
     */
    public function checkDiemByMSHV(Request $request) {
        $mshv = $request->get('mshv');
        $mamon= $request->get('mamon');
        $data = DB::table('hoc_viens')->leftJoin('diems', function($j) use ($mamon) {
            $j->on('hoc_viens.id','=','diems.hv_id')->where('diems.mon_id','=',$mamon);
        })->where('hoc_viens.mshv','=',$mshv)->first();
        return response(json_encode($data))->header('Content-Type', 'application/json');
    }
}
