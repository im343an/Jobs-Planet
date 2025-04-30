@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>Access your account</span></li>
            </ol>
        </div>
    </div>
    <div class="login-container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                            @elseif(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form name="frm" action="{{route('employee.login')}}" method="POST">
                                @csrf
                                <div class="login-box-wrapper">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-center">Access your account</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row gap-20">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input class="form-control" placeholder="Enter your email address"
                                                        name="email" required type="text">
                                                    <span
                                                        class="text-danger">@error('email'){{$message}}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" placeholder="Enter your password"
                                                        name="password" required type="password">
                                                    <span
                                                        class="text-danger">@error('firstname'){{$message}}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
