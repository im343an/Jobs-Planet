@extends('frontend.layouts.main')
@section('main-container')

<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="./">Home</a></li>
                <li><span>Applicants for the job</span></li>
            </ol>
        </div>
    </div>

    <div class="section sm">
        <div class="container">
            <div class="sorting-wrappper">
                <div class="sorting-header">
                    <h3 class="sorting-title">Applicants for the job</h3>
                </div>
            </div>

            <div class="employee-grid-wrapper">
                <div class="GridLex-gap-15-wrappper">
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @if ($applicants->count() > 0)
                        @foreach ($applicants as $applicant)
                        <div class="GridLex-col-3_sm-4_xs-6_xss-12">
                            <div class="employee-grid-item">
                                <div class="action">
                                    <!-- Display any action buttons or links if needed -->
                                </div>
                                <a href="{{ route('employee.employee_detail', ['employeeId' => $applicant->employee->id]) }}"
                                    class="clearfix">
                                    <div class="image">
                                        @if ($applicant->employee->image)
                                        <img class="img-circle autofit2"
                                            src="{{ asset('storage/' . $applicant->employee->image) }}"
                                            alt="Employee Image">
                                        @else
                                        <img class="img-circle autofit2" src="{{ url('frontend/images/default.jpg') }}"
                                            alt="Default Image">
                                        @endif
                                    </div>
                                    <div class="content">
                                        <h4>{{ $applicant->employee->firstname }} {{ $applicant->employee->lastname }}
                                        </h4>
                                        @if($applicant->employee->city && $applicant->employee->education )
                                        <p class="location"><i class="fa fa-map-marker"></i>
                                            {{ $applicant->employee->city }}</p>
                                        <h6 class="text-primary">Education: {{ $applicant->employee->education }}
                                            in {{ $applicant->employee->title }}</h6>
                                        @else
                                        <br>
                                        <h6>Profile incomplete</h6>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No applicants found.</p>
                        @endif
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

@endsection