@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Nightingale Jobs</a></li>
                <li><span>Applied Jobs</span></li>
            </ol>
        </div>
    </div>
    <div class="admin-container-wrapper">
        <div class="container">
            <div class="GridLex-gap-15-wrappper">
                <div class="GridLex-grid-noGutter-equalHeight">
                    <div class="GridLex-col-3_sm-4_xs-12">
                        <div class="admin-sidebar">
                            <div class="admin-user-item">
                                <div class="image">
                                    @if ($employee->image)
                                    <img class="img-circle autofit2" src="{{ asset('storage/' . $employee->image) }}"
                                        alt="Employee Image">
                                    @else
                                    <img class="img-circle autofit2" src="{{ url('frontend/images/default.jpg') }}"
                                        alt="Default Image">
                                    @endif
                                </div>
                                <br>
                                <h4>{{ $employee->firstname }} {{ $employee->lastname }}</h4>
                            </div>
                            <div class="admin-user-action text-center">
                                <a href="{{route('employee.employee_detail', ['employeeId' => $employee->id])}}"
                                    class="btn btn-primary btn-sm btn-inverse">View
                                    my CV</a>
                            </div>
                            <ul class="admin-user-menu clearfix">
                                <li>
                                    <a href="{{route('employee.dashboard')}}"><i class="fa fa-user"></i> Profile</a>
                                </li>
                                <li class="">
                                    <a href="{{route('employee.ChangePassword')}}"><i class="fa fa-key"></i> Change
                                        Password</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Qualifications')}}"><i class="fa fa-trophy"></i>
                                        Professional Qualifications</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.LanguageProficiency')}}"><i class="fa fa-language"></i>
                                        Language Proficiency</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Training')}}"><i class="fa fa-gears"></i> Training &
                                        Workshop</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.AcademicQualifications')}}"><i
                                            class="fa fa-graduation-cap"></i> Academic Qualifications</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Experience')}}"><i class="fa fa-briefcase"></i>
                                        Working Experience</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Attachment')}}"><i class="fa fa-folder-open"></i>
                                        Other Attachments</a>
                                </li>
                                <li class="active">
                                    <a href="{{route('employee.AppliedJobs')}}"><i class="fa fa-bookmark"></i>
                                        Applied Jobs</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="GridLex-col-9_sm-8_xs-12">
                        <div class="admin-content-wrapper">
                            <div class="admin-section-title">
                                <h2>Applied Jobs</h2>
                            </div>
                            @foreach ($appliedJobs as $appliedJob)
                            @if ($appliedJob->job)
                            <div class="resume-list-wrapper">
                                <div class="resume-list-item">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10">
                                            <div class="content">
                                                <a
                                                    href="{{ route('employer.Explore_Job', ['id' => $appliedJob->job->id]) }}">
                                                    <div class="image">
                                                        @if ($appliedJob->job->employer->image)
                                                        <img class="img-circle autofit2"
                                                            src="{{ asset('storage/' . $appliedJob->job->employer->image) }}"
                                                            alt="Employer Image">
                                                        @else
                                                        <img class="img-circle autofit2"
                                                            src="{{ url('frontend/images/default.jpg') }}"
                                                            alt="Default Image">
                                                        @endif
                                                    </div>
                                                    <div class="content">
                                                        <h4>{{ $appliedJob->job->job_title }}</h4>
                                                        <p>{{ $appliedJob->job->companyname }}</p>
                                                        <p>{{ $appliedJob->job->employer->name }}</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-9">
                                                            <i class="fa fa-map-marker text-primary"></i>
                                                            {{ $appliedJob->job->city}}
                                                        </div>
                                                        <span class="font12 block spacing1 font400 text-center">
                                                            Applied:
                                                            {{ date('d F Y', strtotime($appliedJob->created_at->format('Y-m-d'))) }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pager-wrapper">
                                    <ul class="pager-list">
                                        <!-- Pager items -->
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection