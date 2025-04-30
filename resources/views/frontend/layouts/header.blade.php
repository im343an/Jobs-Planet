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

    <link rel="stylesheet" href="{{url('frontend/bootstrap-wysiwyg/bootstrap3-wysihtml5.min.css')}}">
    <script src="{{url('frontend/bootstrap-wysiwyg/bootstrap3-wysihtml5.all.min.js')}}"></script>












</head>
<style>
.autofit2 {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.img {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 2px solid #ccc;
    overflow: hidden;
}

.image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
}

.img-circle {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.job-type-label {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 4px;
    color: #fff;
}

.job-type-label.full-time {
    background-color: #f0ad4e;
    /* Orange */
}

.job-type-label.part-time {
    background-color: #d9534f;
    /* Red */
}

.job-type-label.freelance {
    background-color: #5cb85c;
    /* Green */
}

.section-title {
    margin-bottom: 40px;
}

.section-title h4 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.section-title .underline {
    width: 50px;
    height: 2px;
    background-color: #007bff;
    margin-top: 5px;
}
</style>

<body class="not-transparent-header">
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
