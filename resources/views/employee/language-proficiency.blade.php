@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Bwire Jobs</a></li>
                <li><span>Language Proficiency</span></li>
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
                                    class="btn btn-primary btn-sm btn-inverse">View my CV</a>
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
                                <li class="active">
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
                                    <a href="{{route('employee.Experience')}}"><i class="fa fa-briefcase"></i> Working
                                        Experience</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Attachment')}}"><i class="fa fa-folder-open"></i> Other
                                        Attachments</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.AppliedJobs')}}"><i class="fa fa-bookmark"></i> Applied
                                        Jobs</a>
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
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <h2>Language Proficiency</h2>
                            </div>
                            @foreach($language_proficiencys as $language_proficiency)
                            <div class="resume-list-wrapper">
                                <div class="resume-list-item">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10">
                                            <div class="content">
                                                <a>
                                                    <div class="image">
                                                        @if ($employee->image)
                                                        <img class="img-circle autofit2"
                                                            src="{{ asset('storage/' . $employee->image) }}"
                                                            alt="Employee Image">
                                                        @else
                                                        <img class="img-circle autofit2"
                                                            src="{{ url('frontend/images/default.jpg') }}"
                                                            alt="Default Image">
                                                        @endif
                                                    </div>
                                                    <h4>{{$language_proficiency->language}}</h4>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <i class="fa fa-user mr-5"></i> Speak - <strong
                                                                class="mr-10">{{$language_proficiency->speak}}</strong>
                                                            <i class="fa fa-book mr-5"></i> Read - <strong
                                                                class="mr-10">{{$language_proficiency->read}}</strong>
                                                            <i class="fa fa-pencil mr-5"></i> Write - <strong
                                                                class="mr-10">{{$language_proficiency->write}}</strong>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Edit Modal -->
                                        <div class="col-sm-12 col-md-2">
                                            <div class="resume-list-btn">
                                                <button class="btn btn-primary btn-sm mb-5 mb-0-sm" data-toggle="modal"
                                                    data-target="#EditModal{{ $language_proficiency->id }}">Edit</button>
                                                <button class="btn btn-primary btn-sm btn-inverse" data-toggle="modal"
                                                    data-target="#deleteModal{{ $language_proficiency->id }} ">Delete</button>
                                                <div id="EditModal{{ $language_proficiency->id }}"
                                                    class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
                                                    style="display: none;"
                                                    aria-labelledby="EditModal{{ $language_proficiency->id }}"
                                                    data-backdrop="static" data-keyboard="false" data-replace="true">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title text-center"
                                                            id="EditModalLabel{{ $language_proficiency->id }}">
                                                            Edit- {{$language_proficiency->language}}
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('employee.LanguageProficiency.update', $language_proficiency->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row gap-20">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editlanguage{{ $language_proficiency->id }}">Language</label>
                                                                        <input class="form-control"
                                                                            id="Editlanguage{{ $language_proficiency->id }}"
                                                                            placeholder="Enter language name"
                                                                            value="{{$language_proficiency->language}}"
                                                                            type="text" name="language" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editspeak{{ $language_proficiency->id }}">Speak</label>
                                                                        <select name="speak"
                                                                            id="Editspeak{{ $language_proficiency->id }}"
                                                                            required
                                                                            value="{{ $language_proficiency->speak }}"
                                                                            class="selectpicker show-tick form-control"
                                                                            data-live-search="false">
                                                                            <option value="fair"
                                                                                {{ $language_proficiency->speak === 'fair' ? 'selected' : '' }}>
                                                                                Fair</option>
                                                                            <option value="good"
                                                                                {{ $language_proficiency->speak === 'good' ? 'selected' : '' }}>
                                                                                Good</option>
                                                                            <option value="very good"
                                                                                {{ $language_proficiency->speak === 'very good' ? 'selected' : '' }}>
                                                                                Very Good</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editread{{ $language_proficiency->id }}">Read</label>
                                                                        <select name="read"
                                                                            id="Editread{{ $language_proficiency->id }}"
                                                                            value="{{ $language_proficiency->read }}"
                                                                            required
                                                                            class="selectpicker show-tick form-control"
                                                                            data-live-search="false">
                                                                            <option value="fair"
                                                                                {{ $language_proficiency->read === 'fair' ? 'selected' : '' }}>
                                                                                Fair</option>
                                                                            <option value="good"
                                                                                {{ $language_proficiency->read === 'good' ? 'selected' : '' }}>
                                                                                Good</option>
                                                                            <option value="very good"
                                                                                {{ $language_proficiency->read === 'very good' ? 'selected' : '' }}>
                                                                                Very Good</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editwrite{{ $language_proficiency->id }}">Write</label>
                                                                        <select name="write"
                                                                            id="Editwrite{{ $language_proficiency->id }}"
                                                                            value="{{ $language_proficiency->write }}"
                                                                            required
                                                                            class="selectpicker show-tick form-control"
                                                                            data-live-search="false">
                                                                            <option value="Fair"
                                                                                {{ $language_proficiency->write=== 'fair' ? 'selected' : '' }}>
                                                                                Fair</option>
                                                                            <option value="Good"
                                                                                {{ $language_proficiency->write === 'good' ? 'selected' : '' }}>
                                                                                Good</option>
                                                                            <option value="Very Good"
                                                                                {{ $language_proficiency->write === 'very good' ? 'selected' : '' }}>
                                                                                Very Good
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <input type="hidden" name="langid" value="">
                                                    <div class="modal-footer text-center">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-primary btn-inverse">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit Modal -->
                                </div>
                                <div class="pager-wrapper">
                                    <ul class="pager-list">
                                    </ul>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="deleteModal{{ $language_proficiency->id }}" class="modal fade login-box-wrapper"
                                tabindex="-1" data-width="550" style="display: none;"
                                aria-labelledby="deleteModal{{ $language_proficiency->id }}" data-backdrop="static"
                                data-keyboard="false" data-replace="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title text-center"
                                                id="deleteModalLabel{{ $language_proficiency->id }}">
                                                Delete Confirmation
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Language?</p>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <form
                                                action="{{ route('employee.LanguageProficiency.destroy', $language_proficiency->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Delete Modal -->
                            @endforeach
                            <div class="mt-30">
                                <a data-toggle="modal" href="#QualifModal" class="btn btn-primary btn-lg">Add new</a>
                            </div>
                            <!-- Add Modal -->
                            <div id="QualifModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
                                style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title text-center">Add languages</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('employee.LanguageProficiency_Add')}}" method="POST"
                                        autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gap-20">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Language<span class="text-danger">*</span></label>
                                                    <input class="form-control" placeholder="Enter language name"
                                                        type="text" name="language" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Speak<span class="text-danger">*</span></label>
                                                    <select name="speak" required
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true">
                                                        <option style="color:black" value="fair">Fair</option>
                                                        <option style="color:black" value="good">Good</option>
                                                        <option style="color:black" value="very good">Very Good</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Read<span class="text-danger">*</span></label>
                                                    <select name="read" required
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true">
                                                        <option style="color:black" value="fair">Fair</option>
                                                        ```php
                                                        <option style="color:black" value="good">Good</option>
                                                        <option style="color:black" value="very good">Very Good</option>
                                                        <!-- Corrected value -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Write<span class="text-danger">*</span></label>
                                                        <select name="write" required
                                                            class="selectpicker show-tick form-control"
                                                            data-live-search="true">
                                                            <option style="color:black" value="fair">Fair</option>
                                                            <option style="color:black" value="good">Good</option>
                                                            <option style="color:black" value="very good">Very Good
                                                            </option> <!-- Corrected value -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="button" data-dismiss="modal"
                                                class="btn btn-primary btn-inverse">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Add Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection