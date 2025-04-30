@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Nightingale Jobs</a></li>
                <li><span>Other Attachments</span></li>
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
                                <li class="active">
                                    <a href="{{route('employee.Attachment')}}"><i class="fa fa-folder-open"></i>
                                        Other Attachments</a>
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
                                <h2>Other Attachments</h2>
                            </div>
                            @foreach($attachments as $attachment)
                            <div class="resume-list-wrapper">
                                <div class="resume-list-item">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10">
                                            <div class="content">
                                                <a target="_blank">
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
                                                    <h4>{{$attachment->attachment}}</h4>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-9">
                                                            <i class="fa fa-building text-primary mr-5"></i><strong
                                                                class="mr-10">{{$attachment->issuer}}</strong>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Edit Modal -->
                                        <div class="col-sm-12 col-md-2">
                                            <div class="resume-list-btn">
                                                <button class="btn btn-primary btn-sm mb-5 mb-0-sm" data-toggle="modal"
                                                    data-target="#EditModal{{ $attachment->id }}">Edit</button>
                                                <button class="btn btn-primary btn-sm btn-inverse" data-toggle="modal"
                                                    data-target="#deleteModal{{ $attachment->id }}">Delete</button>
                                                <div id="EditModal{{ $attachment->id }}"
                                                    class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
                                                    style="display: none;"
                                                    aria-labelledby="EditModal{{ $attachment->id }}"
                                                    data-backdrop="static" data-keyboard="false" data-replace="true">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria
                                                            -hidden="true">&times;</button>
                                                        <h4 class="modal-title text-center"
                                                            id="EditModalLabel{{ $attachment->id }}">
                                                            {{$attachment->attachment}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('employee.Attachment.update', $attachment->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row gap-20">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editattachment{{ $attachment->id }}">Attachment
                                                                            Type</label>
                                                                        <input class="form-control"
                                                                            id="Editattachment{{ $attachment->id }}"
                                                                            value="{{$attachment->attachment}}"
                                                                            placeholder="Eg: birth certificate, driving licence"
                                                                            type="text" name="attachment" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editissuer{{ $attachment->id }}">Issuer</label>
                                                                        <input class="form-control"
                                                                            id="Editissuer{{ $attachment->id }}"
                                                                            value="{{$attachment->issuer}}"
                                                                            placeholder="Enter issuer" type="text"
                                                                            name="issuer" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Select Attachment <i>(Leave blank
                                                                                if you dont want to
                                                                                update)</i></label>
                                                                        <input class="form-control"
                                                                            accept="application/pdf" type="file"
                                                                            name="certificate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <input type="hidden" name="attid" value="">
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
                            <div id="deleteModal{{ $attachment->id }}" class="modal fade login-box-wrapper"
                                tabindex="-1" data-width="550" style="display: none;"
                                aria-labelledby="deleteModal{{ $attachment->id }}" data-backdrop="static"
                                data-keyboard="false" data-replace="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title text-center"
                                                id="deleteModalLabel{{ $attachment->id }}">
                                                Delete Confirmation
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Attachment?</p>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <form action="{{ route('employee.Attachment.destroy', $attachment->id) }}"
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
                                    <h4 class="modal-title text-center">Add Attachments</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('employee.Attachment_Add')}}" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gap-20">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Attachment Type</label>
                                                    <input class="form-control"
                                                        placeholder="Eg: birth certificate, driving licence" type="text"
                                                        name="attachment" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Issuer</label>
                                                    <input class="form-control" placeholder="Enter issuer" type="text"
                                                        name="issuer" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Select Attachment</label>
                                                    <input class="form-control" accept="application/pdf" type="file"
                                                        name="file" required>
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