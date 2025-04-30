@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>Employees</span></li>
            </ol>
        </div>
    </div>
    <div class="section sm">
        <div class="container">
            <div class="sorting-wrappper">
                <div class="sorting-header">
                    <h3 class="sorting-title">Employees</h3>
                </div>
            </div>
            <div class="employee-grid-wrapper">
                <div class="GridLex-gap-15-wrappper">
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @foreach($employees as $employee)
                        <div class="GridLex-col-3_sm-4_xs-6_xss-12">
                            <div class="employee-grid-item">
                                <div class="action">
                                    <div class="row gap-10">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="text-left">

                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('employee.employee_detail', ['employeeId' => $employee->id])}}"
                                    class="clearfix">
                                    <div class="image">
                                        @if ($employee->image)
                                        <img class="img-circle autofit2"
                                            src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image">
                                        @else
                                        <img class="img-circle autofit2" src="{{ url('frontend/images/default.jpg') }}"
                                            alt="Default Image">
                                        @endif
                                    </div>
                                    <div class="content">
                                        <h4>{{$employee->firstname}} {{$employee->lastname}}</h4>
                                        @if($employee->education)
                                        <p class="location"><i class="fa fa-map-marker"> {{$employee->city}}</i></p>
                                        <h6 class="text-primary">
                                            Education :{{$employee->education}} in
                                            {{$employee->title}}</h6>
                                        @else
                                        <br>
                                        <h6>Profile incomplete</h6>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
