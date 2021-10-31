@extends('admin.dashboard')

@section('pagetitle',__('admin.qlsinhvien'))

@push('scripts')
    <script type="text/javascript">
        var validateMshv = function(mshv) {
            let patt = /\d{2}\-\d\-\d{7}\-\d{4}/;
            return (patt.test(mshv) && mshv.length==17);
        }
        var validateRequired = function(ht) {
            return ht!="";
        }
        var validateGioitinh = function(gt) {
            if(gt=="Nam" || gt=="Nữ")
                return true;
            return false;
        }
        var validateNgaysinh = function(ns) {
            ns = changeDateFormat(ns);
            if(isNaN(Date.parse(ns)))
                return false
            return true
        }
        var changeDateFormat = function(ns,sep = "/") {
            let tmp = ns.split('/');
            ns = tmp[2] + sep + tmp[1] + sep + tmp[0];
            return ns;
        }
        var checkTrungMSHV = function(item,array) {
            return false;
            let isExisted = false;
            array.forEach(e => {
                if(item==e) {
                    isExisted = true;
                    alert("Trung MSHV "+item);
                }    
            });
            return isExisted;
        }
        $(document).ready(function() {
            $('.form-control').on('focus',function() {
                $(this).removeClass('is-invalid');
            });
            $('#readFromClipboard').on('click', function() {
                $('#data tbody').html("");
                let data = [];
                navigator.clipboard.readText()
                    .then(text => {
                        let records = text.split("\r\n").map(function(v,i) {
                            let v1 = v.split('\t');
                            if(v1.length>2) {
                                let inputData = '';
                                let tdClass = '';
                                if(checkTrungMSHV(v1[1],data)==false && validateMshv(v1[1]) && validateRequired(v1[2].trim()) && validateRequired(v1[3].trim()) && validateGioitinh(v1[5].trim()) && validateNgaysinh(v1[4]) && validateRequired(v1[6].trim())) {
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][mshv]" value="'+v1[1]+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][ho]" value="'+v1[2].trim()+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][ten]" value="'+v1[3].trim()+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][gioitinh]" value="'+v1[5].trim()+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][ngaysinh]" value="'+changeDateFormat(v1[4],"-")+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][lop]" value="'+v1[6].trim()+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][qdtt]" value="'+v1[0].trim()+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][noisinh]" value="'+v1[7].trim()+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][sdt]" value="'+v1[8].trim()+'">'; 
                                    inputData      += '<input type="hidden" name="hocvien['+i+'][email]" value="'+v1[9].trim()+'">'; 
                                    data.push(v1[1]);
                                }else{
                                    tdClass = 'class="table-danger text-secondary"';
                                }
                                $('#data tbody').append("<tr "+tdClass+"><td>"+v1[1]+"</td><td>"+v1[2]+"</td><td>"+v1[3]+"</td><td>"+v1[5]+"</td><td>"+v1[4]+"</td><td>"+v1[6]+"</td></tr>"+inputData);           
                                return v1;
                            }
                        });
                    })
                    .catch(err => {
                        console.error('Failed to read clipboard contents: ', err);
                    });
            });    
        });
    </script>
@endpush

@section('pageheading')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('admin.qlsinhvien') }}</h1>
</div>    
@endsection

@section('content')
<form action="{{ route('admin.hocviens.processimport') }}" method="POST">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.import') }}</h6>
        </div>
        <div class="card-body">  
            <div class="form-row">
                <div class="form-group col">
                    <button id="readFromClipboard" type="button" class="btn btn-info">{{ __('admin.readfromclipboard') }}</button>
                </div>
                <div class="form-group col">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active">
                          <input type="radio" value="1" name="hedt" id="option1" checked> Kết hợp
                        </label>
                        <label class="btn btn-info">
                          <input type="radio" value="2" name="hedt" id="option2"> Elearning
                        </label>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('admin.mahocvien') }}</th>
                            <th>{{ __('admin.ho') }}</th>
                            <th>{{ __('admin.ten') }}</th>
                            <th>{{ __('admin.gioitinh') }}</th>
                            <th>{{ __('admin.ngaysinh') }}</th>
                            <th>{{ __('admin.lophoc') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- data -->
                    </tbody>    
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button name="task" value="save" type="submit" class="btn btn-success"><i class="far fa-save text-white-50"></i> {{ __('admin.save') }}</button>
            <a href="{{ route('admin.hocviens.index') }}" class="btn btn-warning"><i class="far fa-window-close text-white-50"></i> {{ __('admin.cancel') }}</a>
        </div>
    </div>
</form> 
@endsection