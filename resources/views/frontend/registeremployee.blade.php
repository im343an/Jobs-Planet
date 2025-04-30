@extends('frontend.layouts.main')
@section('main-container')
<div class="login-container-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form name="frm" action="{{url('/')}}/registeremployee" method="POST">
                            @csrf
                            <div class="login-box-wrapper">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center">Create your account for free</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row gap-20">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" placeholder="Enter your first name"
                                                    name="firstname" value="{{old('firstname')}}" required type="text">
                                                <span
                                                    class="text-danger">@error('firstname'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" placeholder="Enter your last name"
                                                    name="lastname" value="{{old('lastname')}}" required type="text">
                                                <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input class="form-control" placeholder="Enter your email address"
                                                    name="email" value="{{old('email')}}" required type="text">
                                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="Min 8 and Max 20 characters"
                                                    name="password" required type="password">
                                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Password Confirmation</label>
                                                <input class="form-control" placeholder="Re-type password again"
                                                    name="confirmpassword" required type="password">
                                                <span
                                                    class="text-danger">@error('confirmpassword'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="acctype" value="101">
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button onclick="return val();" type="submit" name="reg_mode"
                                        class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection