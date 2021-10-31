@extends('admin.dashboard')

@section('pagetitle',__('admin.nhapdiem'))

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.vi.min.js" integrity="sha512-o+RlJQ7OEtgCdvdgOJfjEASLgiLB9mA8bfWF4JnyA0cWHy7wtb4S4GRxgPor4iqKKLx0CoIFRcMecGnKSTTY1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        var dshv = [];
        var changeDateFormat = function(ns,sep = "/") {
            let tmp = ns.split('-');
            ns = tmp[2] + sep + tmp[1] + sep + tmp[0];
            return ns;
        }
        var checkHvByMshv = function(mshv) {
            return $.ajax({
                url: '{{ route("admin.hocviens.checkhvbymshv") }}',
                data: 'mshv='+mshv
            });
        }
        var checkDiemByMshv = function(mshv,mamon) {
            return $.ajax({
                url: '{{ route("admin.diems.checkdiembymshv") }}',
                data: 'mshv='+mshv+'&mamon='+mamon
            });    
        }
        $(document).ready(function() {
            $('#importFromClipboard').on('click',function() {
                dshv = [];
                let monId = $('#formMon').val();
                navigator.clipboard.readText()
                    .then(text => {
                        let records = text.split("\r\n").map(async function(v,i) {
                            let v1 = v.split('\t');
                            if(v1.length > 2) {
                                let hv;
                                try {
                                    if(monId) {
                                        dt = await checkDiemByMshv(v1[0],monId);
                                        tmp = [dt.id,dt.mshv,dt.ho,dt.ten,dt.ngaysinh,dt.diemcc,dt.diemkt,dt.diemthi,dt.ghichu,dt.diemcc2,dt.diemkt2,dt.diemthi2,dt.ghichu2];
                                        console.log(tmp);
                                    }else{
                                        hv = await checkHvByMshv(v1[0]);
                                        dshv.push([hv.id,hv.mshv,hv.ho,hv.ten,hv.ngaysinh]);
                                    }
                                }catch(e) {
                                    console.log(e);
                                }
                                return hv;
                            }                            
                        });
                    })
                    .catch(err => {
                        console.error('Failed to read clipboard contents: ', err);
                    });
            });
            $('.datepicker').datepicker({
                'format': 'dd/mm/yyyy',
                'language': 'vi',
                'autoclose': true,
            });
            $('.form-control').on('focus',function() {
                $(this).removeClass('is-invalid');
            });
            $('#formLop').on('change',function() {
                $('form').submit(function(e){
                    e.preventDefault();
                    $(e.currentTarget).find('.frmdiem').each(function(i,e) {
                        $(e).val($(e).val().replace(',','.'));
                    });
                    e.currentTarget.submit();
                });
                $.ajax({
                    url: '{{ route("admin.lops.hvtheolop") }}',
                    data: 'lop='+$(this).val(),
                    success: function(rs) {
                        $('#data tbody').html("");
                        $.each(rs,function(i,v) {
                            let hvRow    = '<tr>';
                            hvRow       +=  '<input name="hv['+i+'][mshv]" type="hidden" value="'+v.mshv+'">';
                            hvRow       +=  '<td class="text-sm">'+v.mshv+'</td>';
                            hvRow       +=  '<td class="text-sm">'+v.ho+'</td>';
                            hvRow       +=  '<td class="text-sm">'+v.ten+'</td>';
                            hvRow       +=  '<td class="text-sm">'+changeDateFormat(v.ngaysinh)+'</td>';
                            hvRow       +=  '<td class="text-center"><input type="text" name="hv['+i+'][diemcc]" class="form-control frmdiem form-control-sm"></td>';
                            hvRow       +=  '<td class="text-center"><input type="text" name="hv['+i+'][diemkt]" class="form-control frmdiem form-control-sm"></td>';
                            hvRow       +=  '<td class="text-center"><input type="text" name="hv['+i+'][diemthi]" class="form-control frmdiem form-control-sm"></td>';
                            hvRow       +=  '<td class="text-center"><input type="text" name="hv['+i+'][ghichu]" class="form-control form-control-sm"></td>';
                            hvRow       +=  '</tr>';
                            $('#data tbody').append(hvRow);    
                        });
                    }
                });
            });    
        });
    </script>
@endpush

@section('pageheading')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('admin.nhapdiem') }}</h1>
</div>    
@endsection

@section('content')
<form action="{{ route('admin.diems.thnhapdiem') }}" method="POST">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.nhapdiem') }}</h6>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col"><button type="button" id="importFromClipboard" class="btn btn-info">Nhập từ clipboard</button></div>
            </div>
            <div class="form-row">
                <div class="form-group col d-none">
                    <label for="formLop">{{ __('admin.lophoc') }}</label>
                    <select name="lop" id="formLop" class="form-control selectpicker" data-live-search="true" title="Chọn lớp học" data-size="8">
                        @foreach ($lops as $item)
                            <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="formMon">{{ __('admin.monthi') }}</label>
                    <select name="mon" id="formMon" class="form-control selectpicker" data-live-search="true" title="Chọn môn thi" data-size="8">
                        @foreach ($mons as $item)
                            <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formNgaythi">{{ __('admin.ngaythi') }}</label>
                    <input type="text" class="form-control datepicker" name="ngaythi">
                </div>
                <div class="form-group col">
                    <label for="formLanthi">{{ __('admin.lanthi') }}</label>
                    <select name="lanthi" id="formLanthi" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('admin.mahocvien') }}</th>
                            <th>{{ __('admin.ho') }}</th>
                            <th>{{ __('admin.ten') }}</th>
                            <th>{{ __('admin.ngaysinh') }}</th>
                            <th>{{ __('admin.diemcc') }}</th>
                            <th>{{ __('admin.diemkt') }}</th>
                            <th>{{ __('admin.diemthi') }}</th>
                            <th>{{ __('admin.ghichu') }}</th>
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
            <button type="reset" class="btn btn-warning"><i class="fas fa-file-export text-white-50"></i> {{ __('admin.cancel') }}</button>
        </div>
    </div>
</form>
@endsection