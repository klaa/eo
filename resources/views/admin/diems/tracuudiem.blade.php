@extends('admin.dashboard')

@section('pagetitle',__('admin.diemthi'))

@push('scripts')
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
    <h1 class="h3 mb-0 text-gray-800">{{ __('admin.tracuudiem') }}</h1>
</div>    
@endsection

@section('content')
<form action="#" method="POST">
    @csrf
    
</form>
@endsection