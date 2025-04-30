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
                                -{{$employer->city}}. -{{$employer->street}}, Pakistan
                                <span class="block"> <i class="fa fa-phone"></i> -{{$employer->phone}}</span>
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
                        <div class="company-detail-company-overview mt-0 clearfix">
                            <div class="section-title-02">
                                <h3 class="text-left">Post a Job</h3>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form action="{{ route('employer.Edit_Post_Jobs', ['id' => $post_job->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gap-20">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <input name="job_title" required type="text" class="form-control"
                                                placeholder="Enter job title" value="{{ $post_job->job_title }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="city" required>
                                                <option value="">-Select City-</option>
                                                <option style="color:black" value="Abbottabad"
                                                    {{ $post_job->city == 'Abbottabad' ? 'selected' : '' }}>Abbottabad
                                                </option>
                                                <option style="color:black" value="Bannu"
                                                    {{ $post_job->city == 'Bannu' ? 'selected' : '' }}>Bannu
                                                </option>
                                                <option style="color:black" value="Dera Ghazi Khan"
                                                    {{ $post_job->city == 'Dera Ghazi Khan' ? 'selected' : '' }}>Dera
                                                    Ghazi
                                                    Khan
                                                </option>
                                                <option style="color:black" value="Faisalabad"
                                                    {{ $post_job->city == 'Faisalabad' ? 'selected' : '' }}>Faisalabad
                                                </option>
                                                <option style="color:black" value="Gujranwala"
                                                    {{ $post_job->city == 'Gujranwala' ? 'selected' : '' }}>Gujranwala
                                                </option>
                                                <option style="color:black" value="Gujrat"
                                                    {{ $post_job->city == 'Gujrat' ? 'selected' : '' }}>Gujrat
                                                </option>
                                                <option style="color:black" value="Hyderabad"
                                                    {{ $post_job->city == 'Hyderabad' ? 'selected' : '' }}>Hyderabad
                                                </option>
                                                <option style="color:black" value="Islamabad"
                                                    {{ $post_job->city == 'Islamabad' ? 'selected' : '' }}>Islamabad
                                                </option>
                                                <option style="color:black" value="Jhang"
                                                    {{ $post_job->city == 'Jhang' ? 'selected' : '' }}>Jhang
                                                </option>
                                                <option style="color:black" value="Karachi"
                                                    {{ $post_job->city == 'Karachi' ? 'selected' : '' }}>Karachi
                                                </option>
                                                <option style="color:black" value="Kasur"
                                                    {{ $post_job->city == 'Kasur' ? 'selected' : '' }}>Kasur
                                                </option>
                                                <option style="color:black" value="Kohat"
                                                    {{ $post_job->city == 'Kohat' ? 'selected' : '' }}>Kohat
                                                </option>
                                                <option style="color:black" value="Lahore"
                                                    {{ $post_job->city == 'Lahore' ? 'selected' : '' }}>Lahore
                                                </option>
                                                <option style="color:black" value="Larkana"
                                                    {{ $post_job->city == 'Larkana' ? 'selected' : '' }}>Larkana
                                                </option>
                                                <option style="color:black" value="Mardan"
                                                    {{ $post_job->city == 'Mardan' ? 'selected' : '' }}>Mardan
                                                </option>
                                                <option style="color:black" value="Mirpur Khas"
                                                    {{ $post_job->city == 'Mirpur Khas' ? 'selected' : '' }}>Mirpur
                                                    Khas
                                                </option>
                                                <option style="color:black" value="Mingora"
                                                    {{ $post_job->city == 'Mingora' ? 'selected' : '' }}>Mingora
                                                </option>
                                                <option style="color:black" value="Multan"
                                                    {{ $post_job->city == 'Multan' ? 'selected' : '' }}>Multan
                                                </option>
                                                <option style="color:black" value="Peshawar"
                                                    {{ $post_job->city == 'Peshawar' ? 'selected' : '' }}>Peshawar
                                                </option>
                                                <option style="color:black" value="Quetta"
                                                    {{ $post_job->city == 'Quetta' ? 'selected' : '' }}>Quetta
                                                </option>
                                                <option style="color:black" value="Rahim Yar Khan"
                                                    {{ $post_job->city == 'Rahim Yar Khan' ? 'selected' : '' }}>Rahim
                                                    Yar
                                                    Khan
                                                </option>
                                                <option style="color:black" value="Rawalpindi"
                                                    {{ $post_job->city == 'Rawalpindi' ? 'selected' : '' }}>Rawalpindi
                                                </option>
                                                <option style="color:black" value="Sargodha"
                                                    {{ $post_job->city == 'Sargodha' ? 'selected' : '' }}>Sargodha
                                                </option>
                                                <option style="color:black" value="Sheikhupura"
                                                    {{ $post_job->city == 'Sheikhupura' ? 'selected' : '' }}>Sheikhupura
                                                </option>
                                                <option style="color:black" value="Sialkot"
                                                    {{ $post_job->city == 'Sialkot' ? 'selected' : '' }}>Sialkot
                                                </option>
                                                <option style="color:black" value="Sukkur"
                                                    {{ $post_job->city == 'Sukkur' ? 'selected' : '' }}>Sukkur
                                                </option>
                                                <option style="color:black" value="Swabi"
                                                    {{ $post_job->city == 'Swabi' ? 'selected' : '' }}>Swabi
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Editjobcatagory{{$post_job->job_catagory}}">Job Category</label>
                                            <select class="form-control" name="job_catagory" id="
                                                Editjobcatagory{{$post_job->job_catagory}}">
                                                <option value="">-Select category-</option>
                                                <option style="color:black" value="Accounting"
                                                    {{ $post_job->job_catagory == 'Accounting' ? 'selected' : '' }}>
                                                    Accounting</option>
                                                <option style="color:black" value="Auditing"
                                                    {{ $post_job->job_catagory == 'Auditing' ? 'selected' : '' }}>
                                                    Auditing</option>
                                                <option style="color:black" value="Banking and Finance Services"
                                                    {{ $post_job->job_catagory == 'Banking and Finance Services' ? 'selected' : '' }}>
                                                    Banking and Finance Services</option>
                                                <option style="color:black" value="CEO and General Management"
                                                    {{ $post_job->job_catagory == 'CEO and General Management' ? 'selected' : '' }}>
                                                    CEO and General Management</option>
                                                <option style="color:black" value="Community and Social Devt"
                                                    {{ $post_job->job_catagory == 'Community and Social Devt' ? 'selected' : '' }}>
                                                    Community and Social Devt</option>
                                                <option style="color:black" value="Creative and Design"
                                                    {{ $post_job->job_catagory == 'Creative and Design' ? 'selected' : '' }}>
                                                    Creative and Design</option>
                                                <option style="color:black" value="Education and Training"
                                                    {{ $post_job->job_catagory == 'Education and Training' ? 'selected' : '' }}>
                                                    Education and Training</option>
                                                <option style="color:black" value="Engineering and Construction"
                                                    {{ $post_job->job_catagory == 'Engineering and Construction' ? 'selected' : '' }}>
                                                    Engineering and Construction</option>
                                                <option style="color:black" value="Farming and Agribusiness"
                                                    {{ $post_job->job_catagory == 'Farming and Agribusiness' ? 'selected' : '' }}>
                                                    Farming and Agribusiness</option>
                                                <option style="color:black" value="Health and Pharmaceutical"
                                                    {{ $post_job->job_catagory == 'Health and Pharmaceutical' ? 'selected' : '' }}>
                                                    Health and Pharmaceutical</option>
                                                <option style="color:black" value="HR and Administration"
                                                    {{ $post_job->job_catagory == 'HR and Administration' ? 'selected' : '' }}>
                                                    HR and Administration</option>
                                                <option style="color:black" value="IT and Telecoms"
                                                    {{ $post_job->job_catagory == 'IT and Telecoms' ? 'selected' : '' }}>
                                                    IT and Telecoms</option>
                                                <option style="color:black" value="Legal"
                                                    {{ $post_job->job_catagory == 'Legal' ? 'selected' : '' }}>Legal
                                                </option>
                                                <option style="color:black" value="Manufacturing"
                                                    {{ $post_job->job_catagory == 'Manufacturing' ? 'selected' : '' }}>
                                                    Manufacturing</option>
                                                <option style="color:black" value="Marketing, Media and Brand"
                                                    {{ $post_job->job_catagory == 'Marketing, Media and Brand' ? 'selected' : '' }}>
                                                    Marketing, Media and Brand</option>
                                                <option style="color:black" value="Mining and Natural Resources"
                                                    {{ $post_job->job_catagory == 'Mining and Natural Resources' ? 'selected' : '' }}>
                                                    Mining and Natural Resources</option>
                                                <option style="color:black" value="Project and Program Management"
                                                    {{ $post_job->job_catagory == 'Project and Program Management' ? 'selected' : '' }}>
                                                    Project and Program Management</option>
                                                <option style="color:black" value="Research, Science and Biotech"
                                                    {{ $post_job->job_catagory == 'Research, Science and Biotech' ? 'selected' : '' }}>
                                                    Research, Science and Biotech</option>
                                                <option style="color:black" value="Security"
                                                    {{ $post_job->job_catagory == 'Security' ? 'selected' : '' }}>
                                                    Security</option>
                                                <option style="color:black" value="Supply Chain and Procurement"
                                                    {{ $post_job->job_catagory == 'Supply Chain and Procurement' ? 'selected' : '' }}>
                                                    Supply Chain and Procurement</option>
                                                <option style="color:black" value="Trades and Services"
                                                    {{ $post_job->job_catagory == 'Trades and Services' ? 'selected' : '' }}>
                                                    Trades and Services</option>
                                                <option style="color:black" value="Transport and Logistics"
                                                    {{ $post_job->job_catagory == 'Transport and Logistics' ? 'selected' : '' }}>
                                                    Transport and Logistics</option>
                                                <option style="color:black" value="Other"
                                                    {{ $post_job->job_catagory == 'Other' ? 'selected' : '' }}>Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="closing_date">Closing Date</label>
                                            <div class="input-group date">
                                                <input name="closing_date" required type="date"
                                                    class="form-control form-control-inline datepicker"
                                                    placeholder="Eg: 2021-06-26" min="{{ date('Y-m-d') }}"
                                                    value="{{ $post_job->closing_date }}">
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
                                                    {{ $post_job->job_type == 'Full-time' ? 'selected' : '' }}>Full-time
                                                </option>
                                                <option value="Part-time"
                                                    {{ $post_job->job_type == 'Part-time' ? 'selected' : '' }}>Part-time
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
                                                <option value="Expert"
                                                    {{ $post_job->experience == 'Expert' ? 'selected' : '' }}>Expert
                                                </option>
                                                <option value="2 Years"
                                                    {{ $post_job->experience == '2 Years' ? 'selected' : '' }}>2 Years
                                                </option>
                                                <option value="3 Years"
                                                    {{ $post_job->experience == '3 Years' ? 'selected' : '' }}>3 Years
                                                </option>
                                                <option value="4 Years"
                                                    {{ $post_job->experience == '4 Years' ? 'selected' : '' }}>4 Years
                                                </option>
                                                <option value="5 Years"
                                                    {{ $post_job->experience == '5 Years' ? 'selected' : '' }}>5 Years
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label>Job Description</label>
                                            <textarea class="form-control bootstrap3-wysihtml5" name="job_description"
                                                required placeholder="Enter description ..."
                                                style="height: 200px;"><?php echo strip_tags($post_job->job_description); ?></textarea>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label>Job Responsibilities</label>
                                            <textarea name="job_responsibilities" required
                                                class="form-control bootstrap3-wysihtml5"
                                                placeholder="Enter responsibilities..."
                                                style="height: 200px;"><?php echo strip_tags($post_job->job_responsibilities); ?></textarea>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group bootstrap3-wysihtml5-wrapper">
                                            <label>Requirements</label>
                                            <textarea name="job_requirements" required
                                                class="form-control bootstrap3-wysihtml5"
                                                placeholder="Enter requirements..."
                                                style="height: 200px;"><?php echo strip_tags($post_job->job_requirements); ?></textarea>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 mt-30">
                                        <button type="submit" class="btn btn-primary btn-lg">Post Your Job</button>
                                    </div>
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