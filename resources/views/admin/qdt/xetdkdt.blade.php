@extends('admin.dashboard')

@section('pagetitle',__('admin.qlthi'))

@push('styles')
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

@push('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>    
    <script>
        var setCrsfToken = function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        }
        var convertNgaySinh = function(ns) {
            ns = new Date(ns);
            return ns.toLocaleDateString('vi-VN');
        }
        $(document).ready(function() {
            setCrsfToken();
            //For data table
            $('#getDsHocvien').on('click',function() {
                $('#dataTable tbody').html('');
                let dslop = $('#frmDSLop').val().split("-").map(function(e) {
                    if(e.includes('AUM')==false) {
                        return "AUM" + e;    
                    }
                    return e;
                });
                let mamon = $('#frmMamon').val();
                $.ajax({
                    url: '{{ route("admin.qdthis.laydshv") }}',
                    data: {'data':dslop,'mamon': mamon},
                    method: 'POST',
                    dataType: 'json',
                    success: function(rs,status,jhr) {
                        console.log(jhr.status)
                        setCrsfToken();
                        $.each(rs,function(i,v) {
                            let stt = i+1;
                            let dkdt = "Đủ điều kiện dự thi"
                            if(v.xetdkdt!=1) {
                                dkdt = "Không đủ ĐKDT do điểm"
                            }
                            let cls = ''
                            let htmlRow = "<tr class='"+cls+"'>";
                            htmlRow += '<td>'+stt+'</td>';    
                            htmlRow += '<td>'+v.mshv+'</td>';    
                            htmlRow += '<td>'+v.ho+'</td>';    
                            htmlRow += '<td>'+v.ten+'</td>';    
                            htmlRow += '<td>'+convertNgaySinh(v.ngaysinh)+'</td>';    
                            htmlRow += '<td>'+v.gioitinh+'</td>';    
                            htmlRow += '<td>'+v.tenlop+'</td>';                            
                            htmlRow += '<td>'+v.email+'</td>';                            
                            htmlRow += '<td>'+dkdt+'</td>';
                            htmlRow += '<td>'+v.dcc+'</td>';
                            htmlRow += '<td>'+v.dkt+'</td></tr>';
                            $('#dataTable tbody').append(htmlRow);    
                        })
                    },
                    error: function() {
                        alert('Phiên làm việc hết hạn! Trang sẽ tự nạp lại.')
                        location.reload();
                    }
                })
            });
        });    
    </script>    
@endpush

@section('pageheading')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('admin.xetdkdt') }}</h1>
</div>    
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.xetdkdt') }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col form-group">
                    <label for="frmMamon">{{ __('admin.mamon') }}</label>
                    <select name="mamon" id="frmMamon" class="form-control selectpicker" data-live-search="true" title="Chọn môn" data-size="8">
                        @foreach ($dsm as $k => $item)
                            <option value="{{ $k }}">{{ $k." - ".$item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="frmDSLop">{{ __('admin.dslop') }}</label>
                    <textarea name="dslop" id="frmDSLop" rows="3" class="form-control" placeholder="Nhập danh sách lớp"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <button class="btn btn-info" id="getDsHocvien">{{ __('admin.getdshv') }}</button>
                </div>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>STT</th>
                            <th>{{ __('admin.mahocvien') }}</th>
                            <th>{{ __('admin.hovadem') }}</th>
                            <th>{{ __('admin.name') }}</th>
                            <th>{{ __('admin.ngaysinh') }}</th>
                            <th>{{ __('admin.gioitinh') }}</th>
                            <th>{{ __('admin.lophoc') }}</th>
                            <th>{{ __('admin.user_email') }}</th>
                            <th>{{ __('admin.dkdt') }}</th>
                            <th>{{ __('admin.dcc') }}</th>
                            <th>{{ __('admin.dkt') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data wil be rendered here after ajax -->
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
    
@endsection