@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('employees')}}">All Employees</a></li>
                <li><span>Profile</span></li>
            </ol>
        </div>
    </div>

    <div class="section sm">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="employee-detail-wrapper">
                        <div class="employee-detail-header text-center admin-user-item">
                            <div class="image">
                                @if ($employee->image)
                                <img class="img-circle autofit2" src="{{ asset('storage/' . $employee->image) }}"
                                    alt="Employee Image">
                                @else
                                <img class="img-circle autofit2" src="{{ url('frontend/images/default.jpg') }}"
                                    alt="Default Image">
                                @endif
                            </div>

                            <h3 class="heading mb-15">{{ $employee->firstname }} {{ $employee->lastname }}</h3>

                            @if ($employee->city && $employee->phone)
                            <p class="location"><i class="fa fa-map-marker"></i> {{ $employee->city }} |
                                <span class="mh-5"></span> <i class="fa fa-phone"></i> {{ $employee->phone }}
                            </p>
                            @else
                            <h6>Profile incomplete</h6>
                            @endif

                            <ul class="meta-list clearfix">
                                <li>
                                    <h4 class="heading">Birth Day</h4>{{ $employee->born }}
                                </li>
                                <li>
                                    <h4 class="heading">Age</h4>
                                    {{ calculateAge($employee->born) }}-year-old
                                </li>
                                <li>
                                    <h4 class="heading">Education</h4>{{ $employee->education }}
                                    in {{ $employee->title }}
                                </li>
                                <li>
                                    <h4 class="heading">Email</h4>{{ $employee->email }}
                                </li>
                            </ul>
                        </div>

                        <div class="employee-detail-company-overview mt-40 clearfix">
                            <h3>Introduce myself</h3>
                            <p>{{$employee->about}}</p>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Education</h3>
                                    <ul class="employee-detail-list">
                                        @foreach($employee->academicQualifications as $qualification)
                                        <li>
                                            <h5>{{ $qualification->institution }}</h5>
                                            <p class="text-muted font-italic">Level - <span
                                                    class="font600 text-primary">{{ $qualification->education }},</span>
                                                {{ $qualification->timeframe }}<span class="font600 text-primary">,
                                                    {{ $qualification->city }}</span>
                                            </p>
                                            <p>
                                                @if ($qualification->file)
                                                <a target="_blank" class="btn btn-primary btn-sm mb-5 mb-0-sm"
                                                    href="{{ asset('storage/' . $qualification->file) }}">View
                                                    Certificate</a>
                                                @endif
                                            </p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <h3>Work Experience</h3>
                            <ul class="employee-detail-list">
                                @foreach($employee->experiences as $qualification)
                                <li>
                                    <h5>{{ $qualification->job_title }}</h5>
                                    <p class="text-muted font-italic"> {{ $qualification->Start_date }} to
                                        {{ $qualification->End_date }} at
                                        <span class="font600 text-primary">{{ $qualification->institution }}
                                        </span>
                                    </p>
                                    <p>Supervisor : <span class="font600 text-primary">{{ $qualification->supervisor }}
                                        </span> , Phone : <span
                                            class="font600 text-primary">{{ $qualification->supervisor_telephone }}
                                        </span>
                                        <br>
                                        {{ $qualification->Duties }}
                                    </p>
                                </li>
                                @endforeach
                            </ul>

                            <h3>Training & Workshop</h3>
                            <ul class="employee-detail-list">
                                @foreach($employee->trainings as $qualification)
                                <li>
                                    <h5>{{ $qualification->training_name }}</h5>
                                    <p class="text-muted font-italic">{{ $qualification->training_institution }} <span
                                            class="font600 text-primary">{{ $qualification->timeframe }}
                                        </span>
                                    </p>
                                    <a target="_blank" class="btn btn-primary btn-sm mb-5 mb-0-sm"
                                        href="{{ asset('storage/' . $qualification->file) }}">View
                                        Certificate</a>
                                </li>
                                @endforeach
                            </ul>

                            <h3>Professional Qualifications</h3>
                            <ul class="employee-detail-list">
                                @foreach($employee->pro_qualifications as $qualification)
                                <li>
                                    <h5>{{$qualification->course}}</h5>
                                    <p class="text-muted font-italic">{{$qualification->timeframe}}<span
                                            class="font600 text-primary"> {{$qualification->institution}}
                                        </span>{{$qualification->city}}
                                    </p>
                                    <a target="_blank" class="btn btn-primary btn-sm mb-5 mb-0-sm"
                                        href="{{ asset('storage/' . $qualification->file) }}">View
                                        Certificate</a>
                                </li>
                                @endforeach
                            </ul>

                            <h3>Other Attachments</h3>
                            <ul class="employee-detail-list">
                                @foreach($employee->attachments as $qualification)
                                <li>
                                    <h5>{{$qualification->attachment}}</h5>
                                    <p class="font600 text-primary">{{$qualification->issuer}}</p>
                                    <a target="_blank" class="btn btn-primary btn-sm mb-5 mb-0-sm"
                                        href="{{ asset('storage/' . $qualification->file) }}">View
                                        Certificate</a>
                                </li>
                                @endforeach
                            </ul>

                            <h3>Language Proficiency</h3>
                            <ul class="employee-detail-list">
                                @foreach($employee->language_proficiencys as $qualification)
                                <li>
                                    <h5>{{$qualification->language}}</h5>
                                    <p class="text-muted font-italic">Speaking <span class="font600 text-primary">
                                            {{$qualification->speak}}</span> ,
                                        Reading <span class="font600 text-primary"> {{$qualification->read}}
                                        </span> , Writing <span class="font600 text-primary">
                                            {{$qualification->write}}</span>
                                    </p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
