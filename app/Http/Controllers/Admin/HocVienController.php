<?php

namespace App\Http\Controllers\Admin;

use App\HocVien;
use App\Http\Controllers\Controller;
use App\Lop;
use App\QuyetDinhTrungTuyen;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use stdClass;

class HocVienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hocviens.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lops = Lop::get();
        return view('admin.hocviens.create',compact('lops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ho'                => 'required',
            'ten'               => 'required',
            'mshv'              => 'unique:hoc_viens,mshv',
            'ngaysinh'          => 'date_format:d/m/Y',
            'gioitinh'          => 'nullable',
            'noisinh'           => 'nullable',
            'dantoc'            => 'nullable',
            'vanbang'           => 'nullable',
            'ma_so_vanbang'     => 'nullable',
            'namtn'             => 'nullable',
            'noicap'            => 'nullable',
            'ma_qdtt'           => 'nullable',
            'lops.*'            => 'nullable|numeric',
        ]);
        $validatedData['ngaysinh'] = $this->validateDate($validatedData['ngaysinh']);
        $hocvien = new HocVien($validatedData);
        if($hocvien->save($validatedData)) {     
            $hocvien->lops()->sync($validatedData['lops']);       
            $msg = __('admin.create_hocvien_success');
            $msg_type = 'success';
        }else{
            $msg = __('admin.action_failed');
            $msg_type = 'error';
        }
        $routename = 'admin.hocviens.index';
        return redirect()->route($routename)->with($msg_type,$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HocVien  $hocvien
     * @return \Illuminate\Http\Response
     */
    public function show(HocVien $hocvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HocVien  $hocVien
     * @return \Illuminate\Http\Response
     */
    public function edit(HocVien $hocvien)
    {
        $lops = Lop::get();
        $qdtt = QuyetDinhTrungTuyen::get();
        return view('admin.hocviens.edit',compact('hocvien','lops','qdtt'));
    }

    public function validateDate($date) {
        $date = explode("/",$date);
        if(checkdate($date[1],$date[0],$date[2])) {
            $result = $date[2].'-'.$date[1].'-'.$date[0];
        }else{
            $result = false;
        }
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HocVien  $hocVien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HocVien $hocvien)
    {
        $validatedData = $request->validate([
            'ho'                => 'required',
            'ten'               => 'required',
            'mshv'              => ['required','unique:hoc_viens,mshv,'.$hocvien->id],
            'ngaysinh'          => 'date_format:d/m/Y',
            'gioitinh'          => 'nullable',
            'noisinh'           => 'nullable',
            'dantoc'            => 'nullable',
            'vanbang'           => 'nullable',
            'ma_so_vanbang'     => 'nullable',
            'namtn'             => 'nullable',
            'noicap'            => 'nullable',
            'ma_qdtt'           => 'nullable',
            'lops.*'            => 'nullable|numeric',
        ]);
        $validatedData['ngaysinh'] = $this->validateDate($validatedData['ngaysinh']);
        if($hocvien->update($validatedData)) {     
            $hocvien->lops()->sync($validatedData['lops']);       
            $msg = __('admin.update_hocvien_success');
            $msg_type = 'success';
        }else{
            $msg = __('admin.action_failed');
            $msg_type = 'error';
        }
        $routename = 'admin.hocviens.index';
        $param = [];
        if($request->task=='save') {
            $routename = 'admin.hocviens.edit';
            $param  = $hocvien;
        }
        return redirect()->route($routename,$param)->with($msg_type,$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HocVien  $hocVien
     * @return \Illuminate\Http\Response
     */
    public function destroy(HocVien $hocvien)
    {
        $name = $hocvien->ho . " " . $hocvien->ten;
        //Xóa khỏi lớp trước.
        $hocvien->lops()->detach();
        if($hocvien->delete()) {
            $message = __('admin.post_deleted',compact('name'));
            $message_state = 'success';
        }else{
            $message = __('admin.action_failed');
            $message_state = 'error';
        }
        return redirect()->route('admin.hocviens.index')->with($message_state,$message);
    }

    public function getImport() {
        return view('admin.hocviens.import');
    }

    public function processImport(Request $request) {
        $hdt = $request->get('hedt');
        $validatedData = Validator::make($request->all(), [
            'hocvien.*.ho'          => 'required',
            'hocvien.*.ten'         => 'required',
            'hocvien.*.gioitinh'    => 'required',
            'hocvien.*.lop'         => 'required',
            'hocvien.*.mshv'        => 'unique:hoc_viens,mshv',
            'hocvien.*.ngaysinh'    => 'date',
            'hocvien.*.qdtt'        => 'nullable|string',
            'hocvien.*.noisinh'     => 'nullable|string',
            'hocvien.*.sdt'         => 'nullable|string',
            'hocvien.*.email'       => 'nullable|email',
        ])->validate();
        $errors = array();
        $success_imported = 0;
        foreach($validatedData['hocvien'] as $hv) {
            $hv['hedt'] = $hdt;
            try {
                $hv['status'] = 1;
                $tmp_HV =  HocVien::with('lops')->where(['mshv'=>$hv['mshv']])->first();
                if($tmp_HV) {
                    $trung_HV = false;   
                    foreach ($tmp_HV->lops as $value) {
                        if($value->ten == $hv['lop']) {
                            $trung_HV = true;
                            continue;
                        }
                    }
                    if($trung_HV) {
                        array_push($errors, $hv['mshv'].' - '.$hv['ho'].' '.$hv['ten'].' bị trùng! ');
                        continue;
                    }
                    $tmp = $tmp_HV; 
                }else{
                    $tmp = new HocVien($hv);
                    $tmp->save();
                }
                $lop = Lop::firstOrCreate(['ten'=>$hv['lop']]);
                $tmp->lops()->attach($lop->id);
                $qdtt = QuyetDinhTrungTuyen::firstOrCreate(['ten'=>$hv['qdtt']]);
                $tmp->qdtt()->associate($qdtt);
                $tmp->save();
                $success_imported++;
            } catch (Exception $e) {
                array_push($errors, $hv['mshv'].' - '.$hv['ho'].' '.$hv['ten'].' bị trùng! ');
            }
        }
        if(count($errors)>0) {
            $messageBag = new MessageBag($errors);
            $request->session()->flash('errors',$messageBag);
        }
        return redirect()->route('admin.hocviens.index')->with('success','Nhập thành công '.$success_imported.' học viên!');
    }

    /**
     * Prepare data for datatable ajax request
     * @return JSON 
     */
    public function getDatatable() {
        $items = HocVien::with(['lops'])->orderBy('ten','ASC')->orderBy('ho','ASC')->get()->map(function($item) {
            $tenlop = $item->lops->implode('ten','<br />');
            $name   = '<a href="'.route('admin.hocviens.edit',$item).'">'.$item->ho." ".$item->ten.'</a>';
            $action = '<a href="'.route('admin.hocviens.edit',$item).'" class="btn btn-info btn-sm"><i class="far fa-edit fa-sm"></i></a> <a data-action="'.route('admin.hocviens.destroy',$item).'" href="#deleteModal" data-toggle="modal" class="btn btn-danger btn-sm deleteButton"><i class="fas fa-trash fa-sm"></i></a>';
            return [$item->mshv,$name,date('d/m/Y', strtotime($item->ngaysinh)),$tenlop,$action];
        });
        $response = new stdClass;
        $response->data = $items;
        return response(json_encode($response))->header('Content-Type', 'application/json');
    }

    /**
     * Kiểm tra học viên có trong hệ thống hay không
     */
    public function checkHVByMSHV(Request $request) {
        $mshv = $request->get('mshv');
        $hv = HocVien::where('mshv',$mshv)->first();
        return response(json_encode($hv))->header('Content-Type', 'application/json');
    }
}
