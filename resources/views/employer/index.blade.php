@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Job Planet</a></li>
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
                            <div class="admin-user-item for-employer">
                                <div class="image"
                                    style="width: 180px; height: 180px; display: flex; justify-content: center; align-items: center;">
                                    @if ($employer->image)
                                    <img src="{{ asset('storage/' . $employer->image) }}" class="square-image"
                                        alt="Employee Image"
                                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @else
                                    <center>Company Logo Here</center>
                                    @endif
                                </div>
                                <h3>{{$employer->companyname}}</h3>
                            </div>
                            <div class="admin-user-action text-center">
                                <a href="{{route('employer.Post_Jobs')}}"
                                    class="btn btn-primary btn-sm btn-inverse">Post a Job</a>
                            </div>
                            <ul class="admin-user-menu clearfix">
                                <li class="active">
                                    <a href="{{route('employer.dashboard')}}"><i class="fa fa-user"></i> Profile</a>
                                </li>
                                <li class="">
                                    <a href="{{route('employer.ChangePassword')}}"><i class="fa fa-key"></i> Change
                                        Password</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.Company', ['employerId' => $employer->id])}}"><i
                                            class="fa fa-briefcase"></i>
                                        Company Overview</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.My_Jobs', ['employerId' => $employer->id])}}"><i
                                            class="fa fa-bookmark"></i> Posted
                                        Jobs</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="GridLex-col-9_sm-8_xs-12">
                        <div class="admin-content-wrapper">
                            <div class="admin-section-title">
                                <h2>Profile</h2>
                                <p>Your last logged-in: <span class="text-primary">{{ $employer->last_login }}</span>
                                </p>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form action="{{ route('employer.register.update', $employer->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gap-20">
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="Editcompanyname{{ $employer->id }}">Company Name</label>
                                            <input name="companyname" placeholder="Enter company name"
                                                id="Editcompanyname{{ $employer->id }}"
                                                value="{{$employer->companyname}}" type="text" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editestablish{{ $employer->id }}">Established In</label>

                                            <input name="establish" id="Editestablish{{ $employer->id }}"
                                                placeholder="Enter year eg: 2016, 2017, 2018"
                                                value="{{$employer->establish}}" type="number" class="form-control"
                                                required max="{{ date('Y') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editcompanytype{{ $employer->id }}">Type</label>
                                            <input class="form-control" placeholder="Eg: Booking, Travel"
                                                id="Editcompanytype{{ $employer->id }}"
                                                value="{{$employer->companytype}}" name="companytype" required
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="col-sm-6 col-md-6">
                                                <label for="Editpeople{{ $employer->id }}">People</label>
                                                <select name="people" id="Editpeople{{ $employer->id }}" required
                                                    class="selectpicker show-tick form-control mb-15"
                                                    data-live-search="false">
                                                    <option value="1-10"
                                                        {{ $employer->people == "1-10" ? 'selected' : '' }}>1-10
                                                    </option>
                                                    <option value="11-100"
                                                        {{ $employer->people == "11-100" ? 'selected' : '' }}>11-100
                                                    </option>
                                                    <option value="200+"
                                                        {{ $employer->people == "200+" ? 'selected' : '' }}>200+
                                                    </option>
                                                    <option value="300+"
                                                        {{ $employer->people == "300+" ? 'selected' : '' }}>300+
                                                    </option>
                                                    <option value="1000+"
                                                        {{ $employer->people == "1000+" ? 'selected' : '' }}>1000+
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label for="Editwebsite{{ $employer->id }}">Website</label>
                                            <input type="text" id="Editwebsite{{ $employer->id }}"
                                                value="{{$employer->website}}" class="form-control" name="website"
                                                placeholder="Enter your website">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editcity{{ $employer->id }}">City/town</label>
                                            <input name="city" id="Editcity{{ $employer->id }}"
                                                value="{{$employer->city}}" required type="text" class="form-control"
                                                placeholder="Enter your city">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editstreet{{ $employer->id }}">Street</label>
                                            <input name="street" id="Editstreet{{ $employer->id }}"
                                                value="{{$employer->street}}" required type="text" class="form-control"
                                                placeholder="Enter your street">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="Editzip{{ $employer->id }}">Zip Code</label>
                                            <input name="zip" id="Editzip{{ $employer->id }}" value="{{$employer->zip}}"
                                                required type="text" class="form-control" placeholder="Enter your zip">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editphone{{ $employer->id }}">Phone Number</label>
                                            <input type="text" id="Editphone{{ $employer->id }}"
                                                value="{{$employer->phone}}" name="phone" required class="form-control"
                                                placeholder="Enter your phone">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editemail{{ $employer->id }}">Email Address</label>
                                            <input type="email" name="email" id="Editemail{{ $employer->id }}"
                                                value="{{$employer->email}}" required class="form-control"
                                                placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label for="Editbackground{{ $employer->id }}">Company background</label>
                                            <textarea name="background" id="Editbackground{{ $employer->id }}"
                                                class="bootstrap3-wysihtml5 form-control"
                                                placeholder="Enter company background ..."
                                                style="height: 200px;"><?php echo strip_tags($employer->background); ?></textarea>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label for="Editservices{{ $employer->id }}">Services</label>
                                            <textarea name="services" id="Editservices{{ $employer->id }}"
                                                class="bootstrap3-wysihtml5 form-control"
                                                placeholder="Enter company services ..."
                                                style="height: 200px;"><?php echo strip_tags($employer->services); ?></textarea>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label for="Editexpertise{{ $employer->id }}">Expertise</label>
                                            <textarea name="expertise" id="Editexpertise{{ $employer->id }}"
                                                class="bootstrap3-wysihtml5 form-control"
                                                placeholder="Enter company expertise ..."
                                                style="height: 200px;"><?php echo strip_tags($employer->expertise); ?></textarea>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 mt-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-warning">Cancel</button>
                                    </div>
                                </div>
                            </form><br>
                            <form action="{{ route('employer.register.upload_image', $employer->id) }}" method="POST"
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
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection