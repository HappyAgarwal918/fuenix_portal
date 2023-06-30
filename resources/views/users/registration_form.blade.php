@extends('layouts.master')
@section('css')
<style type="text/css">
    @media (min-width: 576px){
        .modal-dialog {
            max-width: 1000px;
        }
    }
</style>
@endsection

@section('content')
<div id="txtTest" class=""></div>

<div class="container-fluid">
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <button id="btnShow" class="btn btn-success">Register New</button>
            <table class="restu_table">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Duration</th>
                        <th>Joining Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $users)
                    <tr>
                        <td id="indexno">{{ $index +1 }}</td>
                        <td>{{ $users->f_name.' '.$users->l_name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->course }}</td>
                        <td>{{ $users->duration }}</td>
                        <td>{{ Carbon\Carbon::parse($users->created_at)->format('d-m-Y') }}</td>
                        <td><a type="button" href="{{ route('registration_review',$users->id)}}">review</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!--//app-card-body-->
    </div><!--//app-card-->
    
    <div class="modal fade" id="expense_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close_modal" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Registration Form</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('registration_submit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="f_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="l_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qualification" class="form-label">Qualification</label>
                        <input type="text" class="form-control" id="qualification" name="qualification" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="course" class="form-label">Course</label>
                        <input type="text" class="form-control" id="course" name="course" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <select class="form-control form_font" id="duration" name="duration">
                            <option value="">Select Duration</option>
                            <option value="3 Months">Three Months</option>
                            <option value="6 Months">Six Months</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="total_fees" class="form-label">Fees</label>
                        <input type="text" class="form-control" id="total_fees" name="total_fees" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Gender</label><br>
                            <input type="radio" class="btn-check" name="gender" id="male" value="male" autocomplete="off" checked required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>
                            <input type="radio" class="btn-check" name="gender" id="female" value="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>
                            <input type="radio" class="btn-check" name="gender" id="other" value="other" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="other">Other</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="aadhar_number" class="form-label">Aadhar Number</label>
                        <input type="text" class="form-control" id="aadhar_number" name="aadhar_number" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="aadhar_front_" class="form-label">Aadhar Front</label>
                        <input type="file" class="form-control" id="aadhar_front_" name="aadhar_front_" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="aadhar_back_" class="form-label">Aadhar Back</label>
                        <input type="file" class="form-control" id="aadhar_back_" name="aadhar_back_" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="signature_" class="form-label">Signature</label>
                        <input type="file" class="form-control" id="signature_" name="signature_" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="coordinator" class="form-label">Co-ordinator</label>
                        <input type="text" class="form-control" id="coordinator" name="coordinator" value="" required>
                    </div>
                </div>
                <button type="submit" class="btn app-btn-primary">Register</button>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection