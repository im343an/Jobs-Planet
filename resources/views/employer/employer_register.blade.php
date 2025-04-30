@extends('frontend.layouts.main')
@section('main-container')
<div class="login-container-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <!-- Alert message for error -->
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form name="frm" action="{{route('employer.register.create')}}" method="POST">
                            @csrf
                            <div class="login-box-wrapper">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center">Create your account for free</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row gap-20">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input class="form-control" placeholder="Enter your company name"
                                                    name="companyname" required type="text">
                                                @error('companyname')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Company Type</label>
                                                <input class="form-control"
                                                    placeholder="Eg: Booking/Travel, Computer Software etc"
                                                    name="companytype" required type="text">
                                                @error('companytype')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input class="form-control" placeholder="Enter your email address"
                                                    name="email" required type="text">
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="Min 8 and Max 20 characters"
                                                    name="password" required type="password">
                                                @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Password Confirmation</label>
                                                <input class="form-control" placeholder="Re-type password again"
                                                    name="confirmpassword" required type="password">
                                                @error('confirmpassword')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" name="acctype" value="102">
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button onclick="return val();" type="submit" name="reg_mode"
                                        class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                        <!-- Error message for empty fields -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
