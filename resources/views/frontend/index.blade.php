<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Planet</title>
    <meta name="description" content="Online Job Management / Job Portal" />
    <meta name="keywords"
        content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
    <meta name="author" content="BwireSoft">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:image" content="http://{{url('frontend/images/banner.jpg')}}" />
    <meta property="og:image:secure_url" content="https://{{url('frontend/images/banner.jpg')}}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Nightingale Jobs" />
    <meta property="og:description" content="Online Job Management / Job Portal" />
    <link rel="shortcut icon" href="{{url('frontend/images/logo3.png')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/bootstrap/css/bootstrap.min.css')}}" media="screen">
    <link href="{{url('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/component.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('frontend/icons/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/rivolicons/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/flaticon-line-icon-set/flaticon-line-icon-set.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/flaticon-streamline-outline/flaticon-streamline-outline.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/flaticon-thick-icons/flaticon-thick.css')}}">
    <link rel="stylesheet" href="{{url('frontend/icons/flaticon-ventures/flaticon-ventures.css')}}">
    <link href="{{url('frontend//css/style.css')}}" rel="stylesheet">
</head>
<style>
.autofit2 {
    height: 70px;
    width: 400px;
    object-fit: cover;
}

.autofit3 {
    height: 80px;
    width: 100px;
    object-fit: cover;
}

.uppercase-text {
    text-transform: uppercase;
}
</style>

<body class="home">
    <div id="introLoader" class="introLoading"></div>
    <div class="container-wrapper">
        <header id="header">
            <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">
                <div class="container">
                    <div class="logo-wrapper">
                        <div class="logo">
                            <a href="./"><img src="{{url('frontend/images/logo3.png')}}" alt="Logo" /></a>
                        </div>
                    </div>
                    <div id="navbar" class="navbar-nav-wrapper navbar-arrow">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{url('/job-list')}}">Job List</a>
                            </li>
                            <li>
                                <a href="{{url('/employers')}}">Employers</a>
                            </li>
                            <li>
                                <a href="{{url('/employees')}}">Employees</a>
                            </li>
                            <li>
                                <a href="{{url('/contact')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-mini-wrapper">
                        <ul class="nav-mini sign-in">
                            @if(Auth::guard('employer')->check())
                            <!-- User is logged in as an employer -->
                            <li><a href="{{route('employer.logout')}}">Logout</a></li>
                            <li><a href="{{ route('employer.dashboard') }}">Profile</a></li>
                            @elseif(Auth::guard('employee')->check())
                            <!-- User is logged in as an employer -->
                            <li><a href="{{route('employee.logout')}}">Logout</a></li>
                            <li><a href="{{ route('employee.dashboard') }}">Profile</a></li>
                            @else
                            <!-- User is not logged in -->
                            <li><a data-toggle="modal" href="#loginModal">Login</a></li>
                            <li><a data-toggle="modal" href="#registerModal">Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div id="slicknav-mobile"></div>
            </nav>
            <div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;"
                data-backdrop="static" data-keyboard="false" data-replace="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center">Login to Your Account</h4>
                </div>
                <div class="modal-body">
                    <div class="row gap-20">
                        <div class="col-sm-6 col-md-6">
                            <a href="{{route('employer_login_form')}}" class="btn btn-facebook btn-block mb-5-xs">Login
                                as Employer</a>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <a href="{{route('employee_login_form')}}" class="btn btn-facebook btn-block mb-5-xs">Login
                                as Employee</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
                </div>
            </div>
            <div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;"
                data-backdrop="static" data-keyboard="false" data-replace="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center">Create your account for free</h4>
                </div>
                <div class="modal-body">
                    <div class="row gap-20">
                        <div class="col-sm-6 col-md-6">
                            <a href="{{route('employer.register')}}" class="btn btn-facebook btn-block mb-5-xs">Register
                                as Employer</a>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <a href="{{route('employee.register')}}" class="btn btn-facebook btn-block mb-5-xs">Register
                                as Employee</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
                </div>
            </div>
        </header>
    </div>
    <div class="main-wrapper">
        <div class="hero" style="background-image:url('frontend/images/hero-header/01.jpg');">
            <div class="container">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <h1>your bright future starts here now</h1>
                    <p>Finding your next job or career on Job Planet</p>
                    <div class="main-search-form-wrapper">
                        <form action="job-list.php" method="GET" autocomplete="off">
                            <div class="form-holder">
                                <div class="row gap-0">
                                    <div class="col-xss-6 col-xs-6 col-sm-6">
                                        <select class="form-control" name="category" required>
                                            <option value="">-Select category-</option>
                                            <option style="color:black" value="Accounting">Accounting</option>
                                            <option style="color:black" value="Auditing">Auditing</option>
                                            <option style="color:black" value="Bandking and Finance Services">Bandking
                                                and
                                                Finance Services</option>
                                            <option style="color:black" value="CEO and General Management">CEO and
                                                General
                                                Management</option>
                                            <option style="color:black" value="Community and SOcial Devt">Community and
                                                SOcial
                                                Devt</option>
                                            <option style="color:black" value="Creative and Design">Creative and Design
                                            </option>
                                            <option style="color:black" value="Education and Training">Education and
                                                Training
                                            </option>
                                            <option style="color:black" value="Engineering and Construction">Engineering
                                                and
                                                Construction</option>
                                            <option style="color:black" value="Farming and Agribusiness">Farming and
                                                Agribusiness</option>
                                            <option style="color:black" value="Health and Pharmaceutical">Health and
                                                Pharmaceutical</option>
                                            <option style="color:black" value="HR and Administration">HR and
                                                Administration
                                            </option>
                                            <option style="color:black" value="IT and Telecoms">IT and Telecoms</option>
                                            <option style="color:black" value="Legal">Legal</option>
                                            <option style="color:black" value="Manufacturing">Manufacturing</option>
                                            <option style="color:black" value="Marketing, Media and Brand">Marketing,
                                                Media
                                                and
                                                Brand</option>
                                            <option style="color:black" value="Mining and Natural Resources">Mining and
                                                Natural
                                                Resources</option>
                                            <option style="color:black" value="Project and Program Management">Project
                                                and
                                                Program Management</option>
                                            <option style="color:black" value="Research, Science and Biotech">Research,
                                                Science
                                                and Biotech </option>
                                            <option style="color:black" value="Security">Security</option>
                                            <option style="color:black" value="Strategy and Consulting">Strategy and
                                                Consulting
                                            </option>
                                            <option style="color:black" value="Tourism and Travel">Tourism and Travel
                                            </option>
                                            <option style="color:black" value="Trade and Services">Trade and Services
                                            </option>
                                            <option style="color:black" value="Transport and Logistics">Transport and
                                                Logistics
                                            </option>
                                            <option style="color:black" value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-xss-6 col-xs-6 col-sm-6">
                                        <select class="form-control" name="city" required />
                                        <option value="">-Select City-</option>
                                        <option style="color:black" value="Abbottabad">Abbottabad</option>
                                        <option style="color:black" value="Bannu">Bannu</option>
                                        <option style="color:black" value="Dera Ghazi Khan">Dera Ghazi Khan</option>
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
                                        <option style="color:black" value="Rahim Yar Khan">Rahim Yar Khan</option>
                                        <option style="color:black" value="Rawalpindi">Rawalpindi</option>
                                        <option style="color:black" value="Sargodha">Sargodha</option>
                                        <option style="color:black" value="Sheikhupura">Sheikhupura</option>
                                        <option style="color:black" value="Sialkot">Sialkot</option>
                                        <option style="color:black" value="Sukkur">Sukkur</option>
                                        <option style="color:black" value="Swabi">Swabi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-holder">
                                <button name="search" value="✓" type="submit" class="btn"><i
                                        class="ion-android-search"></i></button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="post-hero bg-light">
            <div class="container">
                <div class="process-item-wrapper mt-20">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="process-item clearfix">
                                <div class="icon">
                                    <i class="flaticon-line-icon-set-magnification-lens"></i>
                                </div>
                                <div class="content">
                                    <h5>01 / Search for jobs</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="process-item clearfix">
                                <div class="icon">
                                    <i class="flaticon-line-icon-set-pencil"></i>
                                </div>
                                <div class="content">
                                    <h5>02 / Apply a Job</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="process-item clearfix">
                                <div class="icon">
                                    <i class="flaticon-line-icon-set-calendar"></i>
                                </div>
                                <div class="content">
                                    <h5>03 / Start Working</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-0 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="section-title">
                            <br>
                            <h2>Random Companies</h2>
                        </div>
                    </div>
                </div>
                <div class="row top-company-wrapper with-bg">
                    @foreach($employers as $employer)
                    <div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
                        <div class="top-company">
                            <div class="image"
                                style="width: 180px; height: 180px; display: flex; justify-content: center; align-items: center; border-radius: 0;">
                                @if ($employer->image)
                                <img src="{{ asset('storage/' . $employer->image) }}" class="square-image"
                                    alt="Employee Image"
                                    style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 0;">
                                @else
                                <center>No Company Logo</center>
                                @endif
                            </div>
                            <h6> {{ $employer->companyname }}</h6>
                            <a href="{{ route('employer.Company', ['employerId' => $employer->id]) }}">View Company</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-light pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="section-title">
                            <h2>Latest Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($post_jobs as $job)
                        <div class="recent-job-wrapper alt-stripe mr-0">
                            <a class="recent-job-item clearfix"
                                href="{{ route('employer.Explore_Job',['id' => $job->id]) }}">
                                <div class="GridLex-grid-middle">
                                    <div class="GridLex-col-5_xs-12">
                                        <div class="job-position">
                                            <div class="image"
                                                style="width: 100px; height: 100px; display: flex; justify-content: center; align-items: center; overflow: hidden; margin-right: 10px; border-radius: 4px;">
                                                @if ($job->employer && $job->employer->image)
                                                <img src="{{ asset('storage/' . $job->employer->image) }}"
                                                    class="square-image" alt="Employee Image"
                                                    style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                                @else
                                                <center>Company Logo Here</center>
                                                @endif
                                            </div>
                                            <div class="job-item-list-info">
                                                <div class="row">
                                                    <div class="col-sm-7 col-md-8">
                                                        <h4 class="heading" style="margin-top: 20px;">
                                                            {{ $job->job_title }}</h4>
                                                        <p style="margin-top: -20px;">{{ $job->employer->companyname }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="GridLex-col-5_xs-8_xss-12 mt-10-xss">
                                        <div class="job-location">
                                            <i class="fa fa-map-marker text-primary"></i> </strong>
                                            -{{ $job->city }}
                                        </div>
                                    </div>
                                    <div class="GridLex-col-2_xs-4_xss-12">
                                        @if ($job->job_type == 'Full-time')
                                        <span class="label label-warning"
                                            style="margin-left: 10px; padding: 5px 50px; font-size: 12px; width: fit-content;">
                                            {{ $job->job_type }}
                                        </span>
                                        @elseif ($job->job_type == 'Part-time')
                                        <span class="label label-success"
                                            style="margin-left: 10px; padding: 5px 50px; font-size: 12px; width: fit-content;">
                                            {{ $job->job_type }}
                                        </span>
                                        @else
                                        <span style="font-size: 16px;">{{ $job->job_type }}</span>
                                        @endif
                                        <span class="font12 block spacing1 font400 text-center">
                                            @if (strtotime($job->closing_date) < strtotime(date('Y-m-d'))) <span
                                                class="expired-deadline">Job Expired</span>
                                        @else
                                        {{ $job->closing_date }}
                                        @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-wrapper">
            <div class="main-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="footer-about-us">
                                        <h5 class="footer-title">About Jobs Planet</h5>
                                        <p>Jobs Planet is a job portal, online job management system developed by
                                            Gcians
                                            for his project in february 2023.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5 mt-30-xs">
                                    <h5 class="footer-title">Quick Links</h5>
                                    <ul class="footer-menu clearfix">
                                        <li><a href="./">Home</a></li>
                                        <li><a href="job-list">Job List</a></li>
                                        <li><a href="employers">Employers</a></li>
                                        <li><a href="employees">Employees</a></li>
                                        <li><a href="contact">Contact Us</a></li>
                                        <li><a href="#">Go to top</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-30-sm">
                            <h5 class="footer-title">Jobs Planet</h5>
                            <p>Address : Jinnah Colony, Faisalabad</p>
                            <p>Email : <a href="mailto:nightingale.nath2@gmail.com">hello@Jobsplanet.com</a></p>
                            <p>Phone : <a href="">+92 331 3437100</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <p class="copy-right">&#169; Copyright Jobs Planet Software</p>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <ul class="bottom-footer-menu">
                                <li><a>Developed by Gcians</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <ul class="bottom-footer-menu for-social">
                                <li><a href="#"><i class="ri ri-twitter" data-toggle="tooltip" data-placement="top"
                                            title="twitter"></i></a></li>
                                <li><a href="#"><i class="ri ri-facebook" data-toggle="tooltip" data-placement="top"
                                            title="facebook"></i></a></li>
                                <li><a href="#"><i class="ri ri-instagram" data-toggle="tooltip" data-placement="top"
                                            title="instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <div id="back-to-top">
        <a href="#"><i class="ion-ios-arrow-up"></i></a>
    </div>
    <script type="text/javascript" src="{{url('frontend/js/jquery-1.11.3.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/bootstrap-modalmanager.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/bootstrap-modal.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.easing.1.3.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.slicknav.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.placeholder.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/bootstrap-tokenfield.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/typeahead.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/bootstrap3-wysihtml5.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery-filestyle.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/bootstrap-select.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/ion.rangeSlider.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/handlebars.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.countimator.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.countimator.wheel.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/easy-ticker.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.introLoader.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/jquery.responsivegrid.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/customs.js')}}"></script>
</body>













</html>
