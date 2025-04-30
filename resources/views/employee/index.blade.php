@extends('frontend.layouts.main')
@section('main-container')
@php
$mydate = '01'; // Set the default day value
$mymonth = '01'; // Set the default month value
$myyear = '2000'; // Set the default year value
@endphp
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Bwire Jobs</a></li>
                <li><span>Profile</span></li>
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
                                <li class="active">
                                    <a href="{{route('employee.dashboard')}}"><i class="fa fa-user"></i> Profile</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('employee.ChangePassword') }}"><i class="fa fa-key"></i> Change
                                        Password</a>
                                </li>
                                <li>
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
                                    <a href="{{route('employee.Training')}}"><i class="fa fa-gears"></i> Training &
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
                                    <a href="{{route('employee.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="GridLex-col-9_sm-8_xs-12">
                        <div class="admin-content-wrapper">
                            <div class="admin-section-title">
                                <h2>Profile</h2>
                                <p>Your last logged-in: <span class="text-primary">{{ $employee->last_login }}</span>
                                </p>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form action="{{ route('employee.register.update', $employee->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gap-20">
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editfirstname{{ $employee->id }}">First Name</label>
                                            <input name="firstname" id="Editfirstname{{ $employee->id }}" type="text"
                                                class="form-control" value="{{ $employee->firstname }}"
                                                placeholder=" Enter your first name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editlastname{{ $employee->id }}">Last Name</label>
                                            <input name="lastname" id="Editlastname{{ $employee->id }}" required
                                                type="text" class="form-control" value=" {{$employee->lastname }}"
                                                placeholder="Enter your last name">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editborn{{ $employee->id }}">Born</label>
                                            <div class="row gap-5">
                                                <div class="col-xs-3 col-sm-3">
                                                    <select name="day" id="Editborn{{ $employee->id }}" required
                                                        class="selectpicker form-control" data-live-search="false">
                                                        <option disabled value="">day</option>
                                                        @for ($x = 1; $x <= 31; $x++) @php $day=str_pad($x, 2, '0' ,
                                                            STR_PAD_LEFT); @endphp <option value="{{ $day }}"
                                                            {{ $mydate == $day ? 'selected' : '' }}>
                                                            {{ $day }}</option>
                                                            @endfor
                                                    </select>
                                                </div>
                                                <div class="col-xs-5 col-sm-5">
                                                    <select name="month" id="Editborn{{ $employee->id }}" required
                                                        class="selectpicker form-control" data-live-search="false">
                                                        @for ($x = 1; $x <= 12; $x++) @php $month=str_pad($x, 2, '0' ,
                                                            STR_PAD_LEFT); @endphp <option value="{{ $month }}"
                                                            {{ $mymonth == $month ? 'selected' : '' }}>
                                                            {{ $month }}</option>
                                                            @endfor
                                                    </select>
                                                </div>
                                                <div class="col-xs-4 col-sm-4">
                                                    <select name="year" id="Editborn{{ $employee->id }}"
                                                        class="selectpicker form-control" data-live-search="false">
                                                        @php
                                                        $currentYear = date('Y');
                                                        $startYear = $currentYear - 60;
                                                        @endphp
                                                        @for ($x = $currentYear; $x >= $startYear; $x--)
                                                        <option value="{{ $x }}" {{ $myyear == $x ? 'selected' : '' }}>
                                                            {{ $x }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editemail{{ $employee->id }}">Email</label>
                                            <input type="email" name="email" id="Editemail{{ $employee->id }}" required
                                                class="form-control" value="{{ $employee->email }}"
                                                placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label for="Editeducation{{ $employee->id }}">Education Level</label>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <input name="education" id="Editeducation{{ $employee->id }}" type="text"
                                                value="{{ old('education', $employee->education) }}" required
                                                class="form-control" placeholder="Eg: Diploma, Degree...etc">
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <input name="title" id="Edittitle{{ $employee->id }}" required type="text"
                                                value="{{ old('title', $employee->title) }}" class="form-control mb-15"
                                                placeholder="Eg: Computer Science, IT...etc">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editgender{{ $employee->id }}">Gender</label>
                                            <select name="gender" required id="Editgender{{ $employee->id }}"
                                                class="selectpicker show-tick form-control" data-live-search="false">
                                                <option value="">Select</option>
                                                <option value="Male"
                                                    {{ $employee->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female"
                                                    {{ $employee->gender === 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editcity{{ $employee->id }}">City/town</label>
                                            <input name="city" required id="Editcity{{ $employee->id }}" type="text"
                                                class="form-control" value="{{ $employee->city }}">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editstreet{{ $employee->id }}">Street</label>
                                            <input name="street" id="Editstreet{{ $employee->id }}" required type="text"
                                                class="form-control" value="{{ $employee->street }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editzip{{ $employee->id }}">Zip Code</label>
                                            <input name="zip" id="Editzip{{ $employee->id }}" required type="text"
                                                class="form-control" value="{{ $employee->zip }}">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="Editphone{{ $employee->id }}">Phone Number</label>
                                            <input type="text" id="Editphone{{ $employee->id }}" name="phone" required
                                                class="form-control" value="{{ $employee->phone }}">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label for="Editabout{{ $employee->id }}">About me</label>
                                            <textarea name="about" id="Editabout{{ $employee->id }}"
                                                class="bootstrap3-wysihtml5 form-control"
                                                placeholder="Enter your short description ..."
                                                style="height: 200px;"><?php echo strip_tags($employee->about); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="col-sm-12 mt-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="reset" class="btn btn-primary btn-inverse">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form><br>
                            <form action="{{ route('employee.register.upload_image', $employee->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                        <label>Display Image</label>
                                        <input type="file" name="image" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="col-sm-12 mt-10">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
