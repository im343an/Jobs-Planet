@extends('frontend.layouts.main')

@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Job Planet</a></li>
                <li><span>My Jobs</span></li>
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
                                    class="btn btn-primary btn-sm btn-inverse ">Post a Job</a>
                            </div>
                            <ul class="admin-user-menu clearfix">
                                <li>
                                    <a href="{{route('employer.dashboard')}}"><i class="fa fa-user"></i>
                                        Profile</a>
                                </li>
                                <li class="">
                                    <a href="{{route('employer.ChangePassword')}}"><i class="fa fa-key"></i>
                                        Change
                                        Password</a>
                                </li>

                                <li>
                                    <a href="{{route('employer.Company', ['employerId' => $employer->id])}}"><i
                                            class="fa fa-briefcase"></i>
                                        Company Overview</a>
                                </li>
                                <li class="active">
                                    <a href="{{route('employer.My_Jobs', ['employerId' => $employer->id])}}"><i
                                            class="fa fa-bookmark"></i>
                                        Posted
                                        Jobs</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.logout')}}"><i class="fa fa-sign-out"></i>
                                        Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="GridLex-col-9_sm-8_xs-12">
                        <div class="admin-content-wrapper">
                            <div class="admin-section-title">
                                <h2>Posted Jobs</h2>
                            </div>
                            <div class="job-item-grid-wrapper">
                                <div class="row">
                                    @if($post_jobs->count() > 0)
                                    <!-- Check if there are any jobs -->
                                    @foreach ($post_jobs as $job)
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="job-item-grid" style="margin-bottom: 30px;">
                                            <div class="labeling ">
                                            </div>
                                            <a target="_blank" href="">
                                                <div class="image d-flex align-items-center justify-content-center image-border"
                                                    style="width: 250px; height: 100px; border-radius: 0; padding-top: 30px;">
                                                    @if ($employer->image)
                                                    <img src="{{ asset('storage/' . $employer->image) }}"
                                                        class="square-image" alt="Employee Image">
                                                    @if ($job->job_type == 'Full-time')
                                                    <span class="label label-warning"
                                                        style="margin-left: 10px;">{{$job->job_type}}</span>
                                                    @elseif ($job->job_type == 'Part-time')
                                                    <span class="label label-success"
                                                        style="margin-left: 10px;">{{$job->job_type}}</span>
                                                    @else
                                                    <span>{{$job->job_type}}</span>
                                                    @endif
                                                    @else
                                                    <div class="d-flex align-items-center justify-content-center"
                                                        style="width: 100%; height: 100%;">Company Logo Here</div>
                                                    @endif
                                                </div>
                                                <div class="content">
                                                    <h4 class="heading">{{ $job->job_title }}</h4>
                                                    <p class="location"><i class="fa fa-map-marker text-primary"></i>
                                                        <strong class="text-primary">{{ $job->city }}</strong>
                                                    </p>
                                                    <p class="date text-muted font12 font-italic">Deadline -
                                                        {{ date('d F Y', strtotime($job->closing_date)) }}</p>
                                                </div>
                                            </a>
                                            <div class="content-bottom">
                                                <div class="sub-category">
                                                    <a
                                                        href="{{ route('employer.View-Applicants', ['jobId' => $job->id]) }}">View
                                                        Applicants</a>
                                                    <a
                                                        href="{{ route('employer.Edit_Post_Jobs_form', ['id' => $job->id]) }}">Edit
                                                        Post Job</a>
                                                    <a data-toggle="modal" data-target="#deleteModal" href="">Delete
                                                        Job</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @if($post_jobs->count() > 0)
                            <!-- Check if there are any jobs -->
                            <div id="deleteModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
                                style="display: none;" aria-labelledby="deleteModal" data-backdrop="static"
                                data-keyboard="false" data-replace="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title text-center" id="deleteModalLabel">Delete
                                                Confirmation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Job Post?</p>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <form action="{{ route('employer.Delete_Post_Jobs', ['id' => $job->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div style="margin-top: 40px; text-align: center; color: black; font-size: 20px;">
                                No jobs found</div>
                            @endif



                            <div class="pager-wrapper">
                                <ul class="pager-list">
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
