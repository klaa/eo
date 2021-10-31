@extends('admin.dashboard')

@section('pagetitle',__('admin.user_edit',['name'=>$hocvien->ho.' '.$hocvien->ten]))

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-control').on('focus',function() {
                $(this).removeClass('is-invalid');
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
<form action="{{ route('admin.hocviens.update',$hocvien) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.user_edit',['name'=>$hocvien->ho.' '.$hocvien->ten]) }}</h6>
        </div>
        <div class="card-body">  
            <div class="form-row">
                <div class="form-group col">
                    <label for="formName">{{ __('admin.ho') }}</label>
                    <input type="text" name="ho" value="{{ $hocvien->ho }}" class="form-control @error('ho') is-invalid @enderror" id="formName" aria-describedby="nameHelp">
                </div>
                <div class="form-group col">
                    <label for="formTen">{{ __('admin.ten') }}</label>
                    <input type="text" name="ten" value="{{ $hocvien->ten }}" class="form-control @error('ten') is-invalid @enderror" id="formTen" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formMshv">{{ __('admin.mahocvien') }}</label>
                    <input type="text" name="mshv" pattern="\d{2}-\d{1}-\d{7}-\d{4}" value="{{ $hocvien->mshv }}" class="form-control @error('mshv') is-invalid @enderror" id="formMshv" aria-describedby="nameHelp">
                </div>
                <div class="form-group col">
                    <label for="formNs">{{ __('admin.ngaysinh') }}</label>
                    <input type="text" pattern="\d{2}/\d{2}/\d{4}" name="ngaysinh" value="{{ date('d/m/Y',strtotime($hocvien->ngaysinh)) }}" class="form-control @error('ngaysinh') is-invalid @enderror" id="formNs" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formGioitinh">{{ __('admin.gioitinh') }}</label>
                    <select name="gioitinh" id="formGioitinh" class="form-control @error('gioitinh') is-invalid @enderror">
                        <option value="Nam" @if($hocvien->gioitinh=='Nam') selected @endif>Nam</option>
                        <option value="Nữ" @if($hocvien->gioitinh=='Nữ') selected @endif>Nữ</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="formNoisinh">{{ __('admin.noisinh') }}</label>
                    <input type="text" name="noisinh" value="{{ $hocvien->noisinh }}" class="form-control @error('noisinh') is-invalid @enderror" id="formNoisinh" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formDantoc">{{ __('admin.dantoc') }}</label>
                    <input type="text" name="dantoc" value="{{ $hocvien->dantoc }}" class="form-control @error('dantoc') is-invalid @enderror" id="formDantoc" aria-describedby="nameHelp">
                </div>
                <div class="form-group col">
                    <label for="formVanbang">{{ __('admin.vanbang') }}</label>
                    <input type="text" name="vanbang" value="{{ $hocvien->vanbang }}" class="form-control @error('vanbang') is-invalid @enderror" id="formVanbang" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formMSVanbang">{{ __('admin.msvb') }}</label>
                    <input type="text" name="ma_so_vanbang" value="{{ $hocvien->ma_so_vanbang }}" class="form-control @error('ma_so_vanbang') is-invalid @enderror" id="formMSVanbang" aria-describedby="nameHelp">
                </div>
                <div class="form-group col">
                    <label for="formNamtn">{{ __('admin.namtn') }}</label>
                    <input type="text" pattern="\d{4}" name="namtn" value="{{ $hocvien->namtn }}" class="form-control @error('namtn') is-invalid @enderror" id="formNamtn" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formNoicap">{{ __('admin.noicap') }}</label>
                    <input type="text" name="noicap" value="{{ $hocvien->noicap }}" class="form-control @error('noicap') is-invalid @enderror" id="formNoicap" aria-describedby="nameHelp">
                </div>
                <div class="form-group col">
                    <label for="formQDTT">{{ __('admin.qdtt') }}</label>
                    <select name="ma_qdtt" id="formQDTT" class="form-control selectpicker" data-live-search="true" title="Chọn Quyết định trúng tuyển" data-size="8">
                        @foreach ($qdtt as $item)
                            <option @if($hocvien->qdtt->pluck('id')->contains($item->id)) selected @endif value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formLop">{{ __('admin.lophoc') }}</label>
                    <select name="lops[]" id="formLop" class="form-control selectpicker" multiple data-live-search="true" title="Chọn lớp học" data-size="8">
                        @foreach ($lops as $item)
                            <option @if($hocvien->lops->pluck('id')->contains($item->id)) selected @endif value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>  
        </div>
        <div class="card-footer">
            <button name="task" value="save" type="submit" class="btn btn-success"><i class="far fa-save text-white-50"></i> {{ __('admin.save') }}</button>
            <button name="task" value="saveandexit" type="submit" class="btn btn-success"><i class="fas fa-file-export text-white-50"></i> {{ __('admin.saveandexit') }}</button>
            <a href="{{ route('admin.hocviens.index') }}" class="btn btn-warning"><i class="far fa-window-close text-white-50"></i> {{ __('admin.cancel') }}</a>
        </div>
    </div>
</form> 
@endsection