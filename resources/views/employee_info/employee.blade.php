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
            <button id="btnShow" class="btn btn-success">Register</button>
            <div id="tabs">
                    <div class="m-4">
                        <ul class="nav nav-tabs active_tab">
                            <li class="nav-item">
                                <a href="#tabs-1" class="nav-link active">Developement team</a>
                            </li>
                            <li class="nav-item test">
                                <a href="#tabs-2" class="nav-link">SEO team</a>
                            </li>
                            <li class="nav-item test">
                                <a href="#tabs-3" class="nav-link">HR</a>
                            </li>
                        </ul>
                    </div>
                    <div id="tabs-1">
                        <table class="restu_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="" scope="col">ID</th>
                                    <th class="" scope="col">Name</th>
                                    <th class="" scope="col">Email ID</th>
                                    <th class="" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['develop'] as $develop_key => $develop_user)
                                <tr>
                                    <td>{{ $develop_key +1 }}</td>
                                    <td>{{ $develop_user->f_name.' '.$develop_user->l_name }}</td>
                                    <td>{{ $develop_user->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete User</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-2">
                        <table class="restu_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="" scope="col">ID</th>
                                    <th class="" scope="col">Name</th>
                                    <th class="" scope="col">Email ID</th>
                                    <th class="" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['SEO'] as $seo_key => $seo_user)
                                <tr>
                                    <td>{{ $seo_key +1 }}</td>
                                    <td>{{ $seo_user->f_name.' '.$seo_user->l_name }}</td>
                                    <td>{{ $seo_user->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete User</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-3">
                        <table class="restu_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="" scope="col">ID</th>
                                    <th class="" scope="col">Name</th>
                                    <th class="" scope="col">Email ID</th>
                                    <th class="" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['HR'] as $hr_key => $hr_user)
                                <tr>
                                    <td>{{ $hr_key +1 }}</td>
                                    <td>{{ $hr_user->f_name.' '.$hr_user->l_name }}</td>
                                    <td>{{ $hr_user->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete User</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div><!--//app-card-body-->
    </div><!--//app-card-->
    
    <div class="modal fade" id="expense_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close_modal" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Employee Registration</h4>
                </div>
                <div class="modal-body">
<form action="{{ route('employee_form_submit')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="f_name" class="form-label">First Name</label>
                            <input class="form-control" type="text" name="f_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="l_name" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="l_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label><br>
                            <input type="radio" class="form-control btn-check" name="gender" id="male" checked>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>
                            <input type="radio" class="form-control btn-check" name="gender" id="female">
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <select class="form-select" name="role">
                                <option selected disabled value="">Select</option>
                                @foreach($role as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="linkedin" class="form-label">linkedin ID</label>
                            <input class="form-control" type="text" name="linkedin">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="aadhar_number" class="form-label">Aadhar Number</label>
                            <input class="form-control" type="text" name="aadhar_number">
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="aadhar_front" class="form-label">Aadhar Front</label>
                            <input type="file" class="form-control" id="aadhar_front" name="aadhar_front_" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="aadhar_back" class="form-label">Aadhar Back</label>
                            <input type="file" class="form-control" id="aadhar_back" name="aadhar_back_" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pan_number" class="form-label">Pan Number</label>
                            <input class="form-control" type="text" name="pan_number" placeholder="PAN Number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pan_card" class="form-label">Pan Card</label>
                            <input type="file" class="form-control" id="pan_card" name="pan_card_" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="resume" class="form-label">Resume</label>
                            <input type="file" class="form-control" id="resume" name="resume_" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="degree" class="form-label">Degree Certificate</label>
                            <input type="file" class="form-control" id="degree" name="degree_certificate_" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-mail Address</label>
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label">I confirm that all data are correct</label>
        </div>
        <div class="form-button mt-3">
            <button id="submit" type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection