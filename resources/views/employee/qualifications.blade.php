@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Bwire Jobs</a></li>
                <li><span>Professional Qualifications</span></li>
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
                                    <a href="{{route('employee.dashboard')}}"><i class="fa fa-user"></i>
                                        Profile</a>
                                </li>
                                <li class="">
                                    <a href="{{route('employee.ChangePassword')}}"><i class="fa fa-key"></i>
                                        Change
                                        Password</a>
                                </li>
                                <li class="active">
                                    <a href="{{route('employee.Qualifications')}}"><i class="fa fa-trophy"></i>
                                        Professional
                                        Qualifications</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.LanguageProficiency')}}"><i class="fa fa-language"></i>
                                        Language
                                        Proficiency</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Training')}}"><i class="fa fa-gears"></i>
                                        Training &
                                        Workshop</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.AcademicQualifications')}}"><i
                                            class="fa fa-graduation-cap"></i> Academic
                                        Qualifications</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Experience')}}"><i class="fa fa-briefcase"></i>
                                        Working
                                        Experience</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.Attachment')}}"><i class="fa fa-folder-open"></i>
                                        Other
                                        Attachments</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.AppliedJobs')}}"><i class="fa fa-bookmark"></i>
                                        Applied
                                        Jobs</a>
                                </li>
                                <li>
                                    <a href="{{route('employee.logout')}}"><i class="fa fa-sign-out"></i>
                                        Logout</a>
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
                                <h2>Professional Qualifications</h2>
                            </div>
                            @foreach($pro_qualifications as $pro_qualifications)
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

                                                    <h4>{{$pro_qualifications->course}}</h4>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-9">
                                                            <i
                                                                class="fa fa-graduation-cap text-primary mr-5"></i><strong
                                                                class="mr-10">{{$pro_qualifications->institution}}</strong>
                                                            <i class="fa fa-map-marker text-primary mr-5"></i>
                                                            {{$pro_qualifications->city}}
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 mt-10-sm">
                                                            <i class="fa fa-calendar  text-primary mr-5"></i>
                                                            {{$pro_qualifications->timeframe}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Edit Modal -->

                                        <div class="col-sm-12 col-md-2">
                                            <div class="resume-list-btn">
                                                <button class="btn btn-primary btn-sm mb-5 mb-0-sm" data-toggle="modal"
                                                    data-target="#EditModal{{ $pro_qualifications->id }}">Edit</button>
                                                <button class="btn btn-primary btn-sm btn-inverse" data-toggle="modal"
                                                    data-target="#deleteModal{{ $pro_qualifications->id }}">Delete</button>
                                                <div id="EditModal{{ $pro_qualifications->id }}"
                                                    class="modal fade login-box-wrapper" tabindex="-1" data-width="550"
                                                    style="display: none;"
                                                    aria-labelledby="EditModal{{ $pro_qualifications->id }}"
                                                    data-backdrop="static" data-keyboard="false" data-replace="true">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title text-center"
                                                            id="EditModalLabel{{ $pro_qualifications->id }}">
                                                            {{$pro_qualifications->course}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('employee.Qualification.update', $pro_qualifications->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row gap-20">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editcourse{{ $pro_qualifications->id }}">Course
                                                                            Title</label>
                                                                        <input class="form-control"
                                                                            placeholder="Enter course name" type="text"
                                                                            name="course"
                                                                            id="Editcourse{{ $pro_qualifications->id }}"
                                                                            value="{{$pro_qualifications->course}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editinstitution{{ $pro_qualifications->id }}">Institution
                                                                            Name</label>
                                                                        <input class="form-control"
                                                                            id="Editinstitution{{ $pro_qualifications->id }}"
                                                                            placeholder="Enter institution name"
                                                                            type="text" name="institution"
                                                                            value="{{$pro_qualifications->institution}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Edittimeframe{{ $pro_qualifications->id }}">Time
                                                                            Frame</label>
                                                                        <input class="form-control"
                                                                            id="Edittimeframe{{ $pro_qualifications->id }}"
                                                                            placeholder="Eg: 2015 To 2016" type="text"
                                                                            name="timeframe"
                                                                            value="{{$pro_qualifications->timeframe}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="Editcity{{ $pro_qualifications->id }}">City</label>
                                                                        <select name="city"
                                                                            id="Editcity{{ $pro_qualifications->id }}"
                                                                            value="{{$pro_qualifications->city}}"
                                                                            class="selectpicker show-tick form-control"
                                                                            data-live-search="true">
                                                                            <option value="">-Select City-</option>
                                                                            <option style="color:black" value="Karachi"
                                                                                {{ $pro_qualifications->city === 'Karachi' ? 'selected' : '' }}>
                                                                                Karachi</option>
                                                                            <option style="color:black" value="Lahore"
                                                                                {{ $pro_qualifications->city === 'Lahore' ? 'selected' : '' }}>
                                                                                Lahore</option>
                                                                            <option style="color:black"
                                                                                value="Islamabad"
                                                                                {{ $pro_qualifications->city === 'Islamabad' ? 'selected' : '' }}>
                                                                                Islamabad
                                                                            </option>
                                                                            <option style="color:black"
                                                                                value="Rawalpindi"
                                                                                {{ $pro_qualifications->city === 'Rawalpindi' ? 'selected' : '' }}>
                                                                                Rawalpindi
                                                                            </option>
                                                                            <option style="color:black"
                                                                                value="Faisalabad"
                                                                                {{ $pro_qualifications->city === 'Faisalabad' ? 'selected' : '' }}>
                                                                                Faisalabad
                                                                            </option>
                                                                            <option style="color:black" value="Multan"
                                                                                {{ $pro_qualifications->city === 'Multan' ? 'selected' : '' }}>
                                                                                Multan</option>
                                                                            <option style="color:black"
                                                                                value="Hyderabad"
                                                                                {{ $pro_qualifications->city === 'Hyderabad' ? 'selected' : '' }}>
                                                                                Hyderabad
                                                                            </option>
                                                                            <option style="color:black"
                                                                                value="Gujranwala"
                                                                                {{ $pro_qualifications->city === 'Gujranwala' ? 'selected' : '' }}>
                                                                                Gujranwala
                                                                            </option>
                                                                            <option style="color:black" value="Peshawar"
                                                                                {{ $pro_qualifications->city === 'Peshawar' ? 'selected' : '' }}>
                                                                                Peshawar
                                                                            </option>
                                                                            <option style="color:black" value="Quetta">
                                                                                Quetta</option>
                                                                            <option style="color:black" value="Sargodha"
                                                                                {{ $pro_qualifications->city === 'Sargodha' ? 'selected' : '' }}>
                                                                                Sargodha
                                                                            </option>
                                                                            <option style="color:black" value="Sialkot"
                                                                                {{ $pro_qualifications->city === 'Sialkot' ? 'selected' : '' }}>
                                                                                Sialkot</option>
                                                                            <option style="color:black" value="Sukkur"
                                                                                {{ $pro_qualifications->city === 'Sukkur' ? 'selected' : '' }}>
                                                                                Sukkur</option>
                                                                            <option style="color:black" value="Larkana"
                                                                                {{ $pro_qualifications->city === 'Larkana' ? 'selected' : '' }}>
                                                                                Larkana</option>
                                                                            <option style="color:black"
                                                                                value="Sheikhupura"
                                                                                {{ $pro_qualifications->city === 'Sheikhupura' ? 'selected' : '' }}>
                                                                                Sheikhupura
                                                                            </option>
                                                                            <option style="color:black"
                                                                                value="Rahim Yar Khan"
                                                                                {{ $pro_qualifications->city === 'Rahim Yar Khan' ? 'selected' : '' }}>
                                                                                Rahim Yar
                                                                                Khan</option>
                                                                            <option style="color:black" value="Jhang"
                                                                                {{ $pro_qualifications->city === 'Jhang' ? 'selected' : '' }}>
                                                                                Jhang</option>
                                                                            <option style="color:black" value="Gujrat"
                                                                                {{ $pro_qualifications->city === 'Gujrat' ? 'selected' : '' }}>
                                                                                Gujrat</option>
                                                                            <option style="color:black" value="Mardan"
                                                                                {{ $pro_qualifications->city === 'Mardan' ? 'selected' : '' }}>
                                                                                Mardan</option>
                                                                            <option style="color:black" value="Kasur"
                                                                                {{ $pro_qualifications->city === 'Kasur' ? 'selected' : '' }}>
                                                                                Kasur</option>
                                                                            <option style="color:black"
                                                                                value="Abbottabad"
                                                                                {{ $pro_qualifications->city === 'Abbottabad' ? 'selected' : '' }}>
                                                                                Abbottabad
                                                                            </option>
                                                                            <option style="color:black" value="Swabi"
                                                                                {{ $pro_qualifications->city === 'Swabi' ? 'selected' : '' }}>
                                                                                Swabi</option>
                                                                            <option style="color:black" value="Kohat"
                                                                                {{ $pro_qualifications->city === 'Kohat' ? 'selected' : '' }}>
                                                                                Kohat</option>
                                                                            <option style="color:black"
                                                                                value="Dera Ghazi Khan"
                                                                                {{ $pro_qualifications->city === 'Dera Ghazi Khan' ? 'selected' : '' }}>
                                                                                Dera
                                                                                Ghazi
                                                                                Khan</option>
                                                                            <option style="color:black"
                                                                                value="Mirpur Khas"
                                                                                {{ $pro_qualifications->city === 'Mirpur Khas' ? 'selected' : '' }}>
                                                                                Mirpur Khas
                                                                            </option>
                                                                            <option style="color:black" value="Mingora"
                                                                                {{ $pro_qualifications->city === 'Mingora' ? 'selected' : '' }}>
                                                                                Mingora</option>
                                                                            <option style="color:black" value="Bannu"
                                                                                {{ $pro_qualifications->city === 'Bannu' ? 'selected' : '' }}>
                                                                                Bannu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <b>*(Leave blank if you dont want to
                                                                            update)*</b></label>
                                                                        <input type="file" name="file"
                                                                            accept="application/pdf"
                                                                            class="form-control-file">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <input type="hidden" name="courseid" value="">
                                                    <div class="modal-footer text-center">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-primary btn-inverse">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- End Edit Modal -->

                                        </div>
                                    </div>
                                </div>
                                <div class="pager-wrapper">
                                    <ul class="pager-list">
                                    </ul>
                                </div>
                            </div>

                            <!-- Delete Modal -->

                            <div id="deleteModal{{ $pro_qualifications->id }}" class="modal fade login-box-wrapper"
                                tabindex="-1" data-width="550" style="display: none;"
                                aria-labelledby="deleteModal{{ $pro_qualifications->id }}" data-backdrop="static"
                                data-keyboard="false" data-replace="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title text-center"
                                                id="deleteModalLabel{{ $pro_qualifications->id }}">
                                                Delete Confirmation
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Qualification?</p>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <form
                                                action="{{ route('employee.Qualification.destroy', $pro_qualifications->id) }}"
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
                                    <h4 class="modal-title text-center">Add professional qualifications</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('employee.Qualification_Add')}}" method="POST"
                                        autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gap-20">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Course Title<span class="text-danger">*</span></label>
                                                    <input class="form-control" placeholder="Enter course name"
                                                        type="text" name="course" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Institution Name<span class="text-danger">*</span></label>
                                                    <input class="form-control" placeholder="Enter institution name"
                                                        type="text" name="institution" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Time Frame<span class="text-danger">*</span></label>
                                                    <input class="form-control" placeholder="Eg: 2015 To 2016"
                                                        type="text" name="timeframe" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>City<span class="text-danger">*</span></label>
                                                    <select name="city" required
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true">
                                                        <option value="">-Select City-</option>
                                                        <option style="color:black" value="Karachi">Karachi
                                                        </option>
                                                        <option style="color:black" value="Lahore">Lahore
                                                        </option>
                                                        <option style="color:black" value="Islamabad">Islamabad
                                                        </option>
                                                        <option style="color:black" value="Rawalpindi">
                                                            Rawalpindi
                                                        </option>
                                                        <option style="color:black" value="Faisalabad">
                                                            Faisalabad
                                                        </option>
                                                        <option style="color:black" value="Multan">Multan
                                                        </option>
                                                        <option style="color:black" value="Hyderabad">Hyderabad
                                                        </option>
                                                        <option style="color:black" value="Gujranwala">
                                                            Gujranwala
                                                        </option>
                                                        <option style="color:black" value="Peshawar">Peshawar
                                                        </option>
                                                        <option style="color:black" value="Quetta">Quetta
                                                        </option>
                                                        <option style="color:black" value="Sargodha">Sargodha
                                                        </option>
                                                        <option style="color:black" value="Sialkot">Sialkot
                                                        </option>
                                                        <option style="color:black" value="Sukkur">Sukkur
                                                        </option>
                                                        <option style="color:black" value="Larkana">Larkana
                                                        </option>
                                                        <option style="color:black" value="Sheikhupura">
                                                            Sheikhupura
                                                        </option>
                                                        <option style="color:black" value="Rahim Yar Khan">Rahim
                                                            Yar
                                                            Khan</option>
                                                        <option style="color:black" value="Jhang">Jhang</option>
                                                        <option style="color:black" value="Gujrat">Gujrat
                                                        </option>
                                                        <option style="color:black" value="Mardan">Mardan
                                                        </option>
                                                        <option style="color:black" value="Kasur">Kasur</option>
                                                        <option style="color:black" value="Abbottabad">
                                                            Abbottabad
                                                        </option>
                                                        <option style="color:black" value="Swabi">Swabi</option>
                                                        <option style="color:black" value="Kohat">Kohat</option>
                                                        <option style="color:black" value="Dera Ghazi Khan">Dera
                                                            Ghazi
                                                            Khan</option>
                                                        <option style="color:black" value="Mirpur Khas">Mirpur
                                                            Khas
                                                        </option>
                                                        <option style="color:black" value="Mingora">Mingora
                                                        </option>
                                                        <option style="color:black" value="Bannu">Bannu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Attach your certificate
                                                    </label>
                                                    <input type="file" name="file" accept="application/pdf"
                                                        class="form-control-file">
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
</div>
</div>
@endsection