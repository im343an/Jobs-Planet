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
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <form name="frm" action="{{route('employer.login')}}" method="POST" autocomplete="off">
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
                            <div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1"
                                style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title text-center">Restore your forgotten password</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row gap-20">
                                        <div class="col-sm-12 col-md-12">
                                            <p class="mb-20">Enter the email address associated to your account,
                                                we will send you the link to reset your password</p>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input id="mymail" autocomplete="off" name="email" class="form-control"
                                                    placeholder="Enter your email address" type="email" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="login-box-box-action">
                                                Return to <a data-dismiss="modal">Log-in</a>
                                                <p id="data"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button onclick="update(mymail.value)" type="submit"
                                        class="btn btn-primary">Restore</button>
                                    <button type="button" data-dismiss="modal"
                                        class="btn btn-primary btn-inverse">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection