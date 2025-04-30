@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Nightingale Jobs</a></li>
                <li><span>Experience</span></li>
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
                                <li class="active">
                                    <a href="{{route('employee.Experience')}}"><i class="fa fa-briefcase"></i>
                                        Working Experience</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Attachment')}}"><i class="fa fa-folder-open"></i> Other
                                        Attachments</a>
                                </li>
                                <li>
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
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <h2>Working Experience</h2>
                            </div>
                            @foreach($experiences as $experience)
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
                                                    <h4>{{$experience->job_title}}</h4>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-7">
                                                            <i class="fa fa-building text-primary mr-5"></i><strong
                                                                class="mr-10">{{$experience->institution}}</strong>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 mt-10-sm">
                                                            <i class="fa fa-calendar  text-primary mr-5"></i>
                                                            {{$experience->Start_date}} to {{$experience->End_date}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Edit Modal  -->
                                        <div class="col-sm-12 col-md-2">
                                            <div class="resume-list-btn">
                                                <button class="btn btn-primary btn-sm mb-5 mb-0-sm" data-toggle="modal"
                                                    data-target="#EditModal{{ $experience->id }}">Edit</button>
                                                <button class="btn btn-primary btn-sm btn-inverse" data-toggle="modal"
                                                    data-target="#deleteModal{{ $experience->id }}">Delete</button>
                                                <div id="EditModal{{ $experience->id }}"
                                                    class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
                                                    style="display: none;"
                                                    aria-labelledby="EditModal{{ $experience->id }}"
                                                    data-backdrop="static" data-keyboard="false" data-replace="true">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title text-center"
                                                            id="EditModalLabel{{ $experience->id }}">
                                                            {{$experience->job_title}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <b style="color:#990000">All fields with * are mandatory</b>
                                                        <form
                                                            action="{{ route('employee.Experience.update', $experience->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row gap-20">
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editinstitution{{ $experience->id }}">Institution
                                                                            Name <b style="color:#990000">*</b></label>
                                                                        <input value="{{$experience->institution}}"
                                                                            class="form-control"
                                                                            placeholder="Enter institution name"
                                                                            type="text" name="institution"
                                                                            id="Editinstitution{{ $experience->id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editsupervisor{{ $experience->id }}">Supervisor
                                                                            Name</label>
                                                                        <input value="{{$experience->supervisor}}"
                                                                            class="form-control"
                                                                            placeholder="Enter supervisor name"
                                                                            type="text" name="supervisor"
                                                                            id="Editsupervisor{{ $experience->id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editsupervisor_telephone{{ $experience->id }}">Supervisor
                                                                            Telphone</label>
                                                                        <input
                                                                            value="{{$experience->supervisor_telephone}}"
                                                                            class="form-control"
                                                                            placeholder="Enter supervisor telphone"
                                                                            type="text" name="supervisor_telephone"
                                                                            id="Editsupervisor_telephone{{ $experience->id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editjob_title{{ $experience->id }}">Job
                                                                            Title <b style="color:#990000">*</b></label>
                                                                        <input value="{{$experience->job_title}}"
                                                                            class="form-control"
                                                                            placeholder="Enter job title" type="text"
                                                                            name="job_title"
                                                                            id="Editjob_title{{ $experience->id }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="EditStart_date{{ $experience->id }}">Start
                                                                            Date <b style="color:#990000">*</b></label>
                                                                        <input value="{{$experience->Start_date}}"
                                                                            class="form-control" type="text"
                                                                            name="Start_date"
                                                                            id="EditStart_date{{ $experience->id }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="EditEnd_date{{ $experience->id }}">End
                                                                            Date <b style="color:#990000">*</b></label>
                                                                        <input value="{{$experience->End_date}}"
                                                                            class="form-control" type="text"
                                                                            name="End_date"
                                                                            id="EditEnd_date{{ $experience->id }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="expid" value="">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="EditDuties{{ $experience->id }}">Duties
                                                                            and Responsibilities</label>
                                                                        <textarea class="form-control" name="Duties"
                                                                            id="EditDuties{{ $experience->id }}">{{ $experience->Duties }}</textarea>
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
                                    </div>
                                    <!-- End Edit Modal -->
                                </div>
                                <div class="pager-wrapper">
                                    <ul class="pager-list">
                                    </ul>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="deleteModal{{ $experience->id }}" class="modal fade login-box-wrapper"
                                tabindex="-1" data-width="550" style="display: none;"
                                aria-labelledby="deleteModal{{ $experience->id }}" data-backdrop="static"
                                data-keyboard="false" data-replace="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title text-center"
                                                id="deleteModalLabel{{ $experience->id }}">
                                                Delete Confirmation
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Experience?</p>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <form action="{{ route('employee.Experience.destroy', $experience->id) }}"
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
                            <!-- Add Modal -->
                            <div class="mt-30">
                                <a data-toggle="modal" href="#QualifModal" class="btn btn-primary btn-lg">Add
                                    new</a>
                            </div>
                            <div id="QualifModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
                                style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title text-center">Working Experience</h4>
                                </div>
                                <div class="modal-body">
                                    <b style="color:#990000">All fields with * are mandatory</b>
                                    <form action="{{route('employee.Experience_Add')}}" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gap-20">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Institution Name <b style="color:#990000">*</b></label>
                                                    <input class="form-control" placeholder="Enter institution name"
                                                        type="text" name="institution" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Supervisor Name</label>
                                                    <input class="form-control" placeholder="Enter supervisor name"
                                                        type="text" name="supervisor">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Supervisor Telphone</label>
                                                    <input class="form-control" placeholder="Enter supervisor telphone"
                                                        type="text" name="supervisor_telephone">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Job Title <b style="color:#990000">*</b></label>
                                                    <input class="form-control" placeholder="Enter job title"
                                                        type="text" name="job_title" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Start Date <b style="color:#990000">*</b></label>
                                                    <input class="form-control" placeholder="Eg: y-m-d" type="text"
                                                        name="Start_date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>End Date <b style="color:#990000">*</b></label>
                                                    <input class="form-control" placeholder="Eg: y-m-d" type="text"
                                                        name="End_date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Duties and Responsibilities</label>
                                                    <textarea class="form-control" name="Duties"> </textarea>
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
                        <!-- End Add Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection