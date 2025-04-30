@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Bwire Jobs</a></li>
                <li><span>Change Password</span></li>
            </ol>
        </div>
    </div>
    <div class="admin-container-wrapper">
        <div class="container">
            <div class="GridLex-gap-15-wrappper">
                <div class="GridLex-grid-noGutter-equalHeight">
                    <div class="GridLex-col-3_sm-4_xs-12">
                        <div class="admin-sidebar">
                            <div class="admin-user-item for-employer">
                                <div class="image"
                                    style="width: 180px; height: 180px; display: flex; justify-content: center; align-items: center;">
                                    @if ($employer->image)
                                    <img src="{{ asset('storage/' . $employer->image) }}" class="square-image"
                                        alt="Employee Image"
                                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @else
                                    <center>Company Logo Here</center>
                                    @endif
                                </div>
                                <h3>{{$employer->companyname}}</h3>
                            </div>
                            <div class="admin-user-action text-center">
                                <a href="{{route('employer.Post_Jobs')}}"
                                    class="btn btn-primary btn-sm btn-inverse">Post a Job</a>
                            </div>
                            <ul class="admin-user-menu clearfix">
                                <li>
                                    <a href="{{route('employer.dashboard')}}"><i class="fa fa-user"></i> Profile</a>
                                </li>
                                <li class="active">
                                    <a href="{{route('employer.ChangePassword')}}"><i class="fa fa-key"></i> Change
                                        Password</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.Company', ['employerId' => $employer->id])}}"><i
                                            class="fa fa-briefcase"></i>
                                        Company Overview</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.My_Jobs', ['employerId' => $employer->id])}}"><i
                                            class="fa fa-bookmark"></i> Posted
                                        Jobs</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="GridLex-col-9_sm-8_xs-12">
                        <div class="admin-content-wrapper">
                            <div class="admin-section-title">
                                <h2>Change Password</h2>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form name="frm" class="post-form-wrapper" action="{{ route('employer.UpdatePassword') }}"
                                method="POST">
                                @csrf
                                <div class="row gap-20">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="password" required
                                                placeholder="Enter your new password">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                required placeholder="Confirm your new password">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-primary btn-inverse">Cancel</button>
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
