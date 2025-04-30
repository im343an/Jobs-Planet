@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Employers</a></li>
                <li><span></span></li>
            </ol>
        </div>
    </div>
    <div class="section sm">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="company-detail-wrapper">
                        <div class="company-detail-header text-center">
                            <div class="image"
                                style="width: 180px; height: 180px; display: flex; justify-content: center; align-items: center; border-radius: 0;">
                                @if ($employer->image)
                                <img src="{{ asset('storage/' . $employer->image) }}" class="square-image"
                                    alt="Employee Image"
                                    style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 0;">
                                @else
                                <center>Company Logo Here</center>
                                @endif
                            </div>
                            <h2 class="heading mb-15">{{$employer->companyname}}</h2>
                            @if ($employer->city && $employer->zip)
                            <p class="location"><i class="fa fa-map-marker"></i>-{{$employer->zip}}
                                -{{$employer->city}}.
                                -{{$employer->street}}, Pakistan
                                <span class="mh-5">|</span><i class="fa fa-phone"></i> -{{$employer->phone}}
                            </p>
                            @else
                            <h6>Profile incomplete</h6>
                            @endif
                            <ul class="meta-list clearfix">
                                <li>
                                    <h4 class="heading">Established In</h4>{{$employer->establish}}
                                </li>
                                <li>
                                    <h4 class="heading">Type</h4>{{$employer->companytype}}
                                </li>
                                <li>
                                    <h4 class="heading">People</h4>{{$employer->people}}
                                </li>
                                <li>
                                    <h4 class="heading">Website</h4>
                                    <a target="_blank" href="https://{{$employer->website}}">{{$employer->website}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="company-detail-company-overview clearfix">
                            <h3>Company background</h3>
                            <p>{{$employer->background}}</p>
                            <h3>Services</h3>
                            <p>{{$employer->services}}</p>
                            <h3>Expertise</h3>
                            <p>{{$employer->services}}</p>
                        </div><br><br>
                        <div class="section-title mb-40">
                            <h4 class="text-left">Jobs offered at {{$employer->companyname}}</h4>
                            <div class="underline"></div>
                        </div>
                        <div class="result-wrapper">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mt-25">
                                    @foreach ($post_jobs as $job)
                                    <div class="result-list-wrapper">
                                        <div class="job-item-list">
                                            <div class="image"
                                                style="width: 120px; height: 120px; display: flex; justify-content: center; align-items: center; overflow: hidden; margin-right: 10px; border-radius: 4px;">
                                                @if ($job->employer && $job->employer->image)
                                                <img src="{{ asset('storage/' . $job->employer->image) }}"
                                                    class="square-image" alt="Employee Image"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                                @else
                                                <center>Company Logo Here</center>
                                                @endif
                                            </div>
                                            <div class="content">
                                                <div class="job-item-list-info">
                                                    <div class="row">
                                                        <div class="col-sm-7 col-md-8">
                                                            <h4 class="heading">{{ $job->job_title }}</h4>
                                                            <div class="meta-div clearfix mb-25">
                                                                @if ($job->employer)
                                                                <span>at <a
                                                                        href="">{{ $job->employer->companyname }}</a></span>
                                                                @endif
                                                                @if ($job->job_type == 'Full-time')
                                                                <span class="label label-warning"
                                                                    style="margin-left: 10px;">{{$job->job_type}}</span>
                                                                @elseif ($job->job_type == 'Part-time')
                                                                <span class="label label-danger"
                                                                    style="margin-left: 10px;">{{$job->job_type}}</span>
                                                                @elseif ($job->job_type == 'Freelance')
                                                                <span class="label label-success"
                                                                    style="margin-left: 10px;">{{$job->job_type}}</span>
                                                                @else
                                                                <span>{{$job->job_type}}</span>
                                                                @endif
                                                            </div>
                                                            <p class="texing character_limit">
                                                                {{ $job->job_description }}</p>
                                                        </div>
                                                        <div class="col-sm-5 col-md-4">
                                                            <ul class="meta-list">
                                                                <li>
                                                                    <span>City:</span>
                                                                    {{ $job->city }}
                                                                </li>
                                                                <li>
                                                                    <span>Experience:</span>
                                                                    {{ $job->experience }}
                                                                </li>
                                                                <li>
                                                                    <span>Deadline: </span>
                                                                    @if (strtotime($job->closing_date) <
                                                                        strtotime(date('Y-m-d'))) <span
                                                                        class="expired-deadline">Expired</span>
                                                                        @else
                                                                        {{ $job->closing_date }}
                                                                        @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-item-list-bottom">
                                                    <div class="row">
                                                        <div class="col-sm-7 col-md-8">
                                                            <div class="sub-category">
                                                                <a>{{ $job->job_catagory }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 col-md-4">
                                                            <a href="{{ route('employer.Explore_Job',['id' => $job->id]) }}"
                                                                class="btn btn-primary">View
                                                                This Job</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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

@endsection