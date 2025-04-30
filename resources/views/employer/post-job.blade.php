@extends('frontend.layouts.main')
@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a></a></li>
                <li><span>Post a Job</span></li>
            </ol>
        </div>
    </div>
    <div class="section sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-4">
                    <div class="company-detail-sidebar">
                        <div class="image1"
                            style="width: 180px; height: 180px; display: flex; justify-content: center; align-items: center;">
                            @if ($employer->image)
                            <img src="{{ asset('storage/' . $employer->image) }}" class="square-image"
                                alt="Employee Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            @else
                            <center>Company Logo Here</center>
                            @endif
                        </div>
                        <h2 class="heading mb-15">
                            <h4>{{$employer->companyname}}</h4>
                            <p class="location"><i class="fa fa-map-marker"></i> -{{$employer->zip}}
                                -{{$employer->city}}.
                                -{{$employer->street}}, Pakistan
                                <span class="block"> <i class="fa fa-phone"></i> -{{$employer->phone}}
                                </span>
                            </p>
                            <ul class="meta-list clearfix">
                                <li>
                                    <h4 class="heading">Established In:</h4>{{$employer->establish}}
                                </li>
                                <li>
                                    <h4 class="heading">Type:</h4>{{$employer->companytype}}
                                </li>
                                <li>
                                    <h4 class="heading">People:</h4>{{$employer->people}}
                                </li>
                                <li>
                                    <h4 class="heading">Website</h4>
                                    <a target="_blank" href="https://{{$employer->website}}">{{$employer->website}}</a>
                                </li>
                                <li>
                                    <h4 class="heading">Email: </h4>{{$employer->email}}
                                </li>

                            </ul>
                            <a href="{{route('employer.dashboard')}}" class="btn btn-primary mt-5"><i
                                    class="fa fa-pencil-square-o mr-5"></i>Edit</a>
                    </div>
                </div>
                <div class="col-sm-7 col-md-8">
                    <div class="company-detail-wrapper">
                        <div class="company-detail-company-overview  mt-0 clearfix">
                            <div class="section-title-02">
                                <h3 class="text-left">Post a Job</h3>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form action="{{ route('employer.Post_Jobs_form')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row gap-20">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <input name="job_title" required type="text" class="form-control"
                                                placeholder="Enter job title">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="city" required>
                                                <option value="">-Select City-</option>
                                                <option style="color:black" value="Abbottabad">Abbottabad</option>
                                                <option style="color:black" value="Bannu">Bannu</option>
                                                <option style="color:black" value="Dera Ghazi Khan">Dera Ghazi Khan
                                                </option>
                                                <option style="color:black" value="Faisalabad">Faisalabad</option>
                                                <option style="color:black" value="Gujranwala">Gujranwala</option>
                                                <option style="color:black" value="Gujrat">Gujrat</option>
                                                <option style="color:black" value="Hyderabad">Hyderabad</option>
                                                <option style="color:black" value="Islamabad">Islamabad</option>
                                                <option style="color:black" value="Jhang">Jhang</option>
                                                <option style="color:black" value="Karachi">Karachi</option>
                                                <option style="color:black" value="Kasur">Kasur</option>
                                                <option style="color:black" value="Kohat">Kohat</option>
                                                <option style="color:black" value="Lahore">Lahore</option>
                                                <option style="color:black" value="Larkana">Larkana</option>
                                                <option style="color:black" value="Mardan">Mardan</option>
                                                <option style="color:black" value="Mirpur Khas">Mirpur Khas</option>
                                                <option style="color:black" value="Mingora">Mingora</option>
                                                <option style="color:black" value="Multan">Multan</option>
                                                <option style="color:black" value="Peshawar">Peshawar</option>
                                                <option style="color:black" value="Quetta">Quetta</option>
                                                <option style="color:black" value="Rahim Yar Khan">Rahim Yar Khan
                                                </option>
                                                <option style="color:black" value="Rawalpindi">Rawalpindi</option>
                                                <option style="color:black" value="Sargodha">Sargodha</option>
                                                <option style="color:black" value="Sheikhupura">Sheikhupura</option>
                                                <option style="color:black" value="Sialkot">Sialkot</option>
                                                <option style="color:black" value="Sukkur">Sukkur</option>
                                                <option style="color:black" value="Swabi">Swabi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label>Job Category</label>
                                            <select class="form-control" name="job_catagory" required>
                                                <option value="">-Select category-</option>
                                                <option style="color:black" value="Accounting">Accounting</option>
                                                <option style="color:black" value="Auditing">Auditing</option>
                                                <option style="color:black" value="Banking and Finance Services">Banking
                                                    and Finance Services</option>
                                                <option style="color:black" value="CEO and General Management">CEO and
                                                    General Management</option>
                                                <option style="color:black" value="Community and Social Devt">Community
                                                    and Social Devt</option>
                                                <option style="color:black" value="Creative and Design">Creative and
                                                    Design</option>
                                                <option style="color:black" value="Education and Training">Education and
                                                    Training</option>
                                                <option style="color:black" value="Engineering and Construction">
                                                    Engineering and Construction</option>
                                                <option style="color:black" value="Farming and Agribusiness">Farming and
                                                    Agribusiness</option>
                                                <option style="color:black" value="Health and Pharmaceutical">Health and
                                                    Pharmaceutical</option>
                                                <option style="color:black" value="HR and Administration">HR and
                                                    Administration</option>
                                                <option style="color:black" value="IT and Telecoms">IT and Telecoms
                                                </option>
                                                <option style="color:black" value="Legal">Legal</option>
                                                <option style="color:black" value="Manufacturing">Manufacturing</option>
                                                <option style="color:black" value="Marketing, Media and Brand">
                                                    Marketing, Media and Brand</option>
                                                <option style="color:black" value="Mining and Natural Resources">Mining
                                                    and Natural Resources</option>
                                                <option style="color:black" value="Project and Program Management">
                                                    Project and Program Management</option>
                                                <option style="color:black" value="Research, Science and Biotech">
                                                    Research, Science and Biotech</option>
                                                <option style="color:black" value="Security">Security</option>
                                                <option style="color:black" value="Strategy and Consulting">Strategy and
                                                    Consulting</option>
                                                <option style="color:black" value="Tourism and Travel">Tourism and
                                                    Travel</option>
                                                <option style="color:black" value="Trade and Services">Trade and
                                                    Services</option>
                                                <option style="color:black" value="Transport and Logistics">Transport
                                                    and Logistics</option>
                                                <option style="color:black" value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="closing_date">Closing Date</label>
                                            <div class="input-group date">
                                                <input name="closing_date" required type="date"
                                                    class="form-control form-control-inline datepicker"
                                                    placeholder="Eg: 2021-06-26" min="{{ date('Y-m-d') }}">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-xss-12 col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group mb-20">
                                            <label>Job Type:</label>
                                            <select name="job_type" required class="selectpicker show-tick form-control"
                                                data-live-search="false" data-selected-text-format="count > 3"
                                                data-done-button="true" data-done-button-text="OK"
                                                data-none-selected-text="All" data-html="true">
                                                <option value="" selected>Select</option>
                                                <option value="Full-time"
                                                    data-content="<span class='label label-warning'>Full-time</span>">
                                                    Full-time</option>
                                                <option value="Part-time"
                                                    data-content="<span class='label label-success'>Part-time</span>">
                                                    Part-time
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xss-12 col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group mb-20">
                                            <label>Experience:</label>
                                            <select name="experience" required
                                                class="selectpicker show-tick form-control" data-live-search="false"
                                                data-selected-text-format="count > 3" data-done-button="true"
                                                data-done-button-text="OK" data-none-selected-text="All">
                                                <option value="" selected>Select</option>
                                                <option value="Expert">Expert</option>
                                                <option value="2 Years">2 Years</option>
                                                <option value="3 Years">3 Years</option>
                                                <option value="4 Years">4 Years</option>
                                                <option value="5 Years">5 Years</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label>Job Description</label>
                                            <textarea class="form-control bootstrap3-wysihtml5" name="job_description"
                                                required placeholder="Enter description ..."
                                                style="height: 200px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label>Job Responsibilies</label>
                                            <textarea name="job_responsibilities" required
                                                class="form-control bootstrap3-wysihtml5"
                                                placeholder="Enter responsiblities..."
                                                style="height: 200px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label>Requirements</label>
                                            <textarea name="job_requirements" required
                                                class="form-control bootstrap3-wysihtml5"
                                                placeholder="Enter requirements..." style="height: 200px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-30">
                                        <button type="submit" class="btn btn-primary btn-lg">Post Your Job</button>
                                    </div>
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