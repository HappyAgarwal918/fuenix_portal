@extends('layouts.master')
@section('content')

<div class="container-xl">              
    <h1 class="app-page-title">Registration Review</h1>
    <hr class="mb-4">
    <div class="app-card shadow-sm p-4">
        <div class="app-card-body">
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Name:</label></div>
                <div class="col-md-9"><p>{{ $data->f_name }} {{ $data->l_name }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Email:</label></div>
                <div class="col-md-9"><p>{{ $data->email }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Qualification:</label></div>
                <div class="col-md-9"><p>{{ $data->qualification }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Course:</label></div>
                <div class="col-md-9"><p>{{ $data->course }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Duration:</label></div>
                <div class="col-md-9"><p>{{ $data->duration }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Gender:</label></div>
                <div class="col-md-9"><p>{{ $data->gender }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Aadhar Number:</label></div>
                <div class="col-md-9"><p>{{ $data->aadhar_number }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Aadhar:</label></div>
                <div class="col-md-9"><a class="image-link" href="{{ asset('registration/'.$data->aadhar_front)}}"><img src="{{ asset('registration/'.$data->aadhar_front)}}" width="100"></a>&emsp;<a><img src="{{ asset('registration/'.$data->aadhar_back)}}" width="100"></a><p></p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Signature:</label></div>
                <div class="col-md-9"><img src="{{ asset('registration/'.$data->signature)}}" width="100"><p></p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Co-ordinator:</label></div>
                <div class="col-md-9"><p>{{ $data->coordinator }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Total Fees:</label></div>
                <div class="col-md-9"><p>{{ $data->total_fees }}</p></div>
            </div>
        </div><!--//app-card-body-->
    </div><!--//app-card-->
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
      $('.image-link').magnificPopup({type:'image'});
    });
</script>
@endsection