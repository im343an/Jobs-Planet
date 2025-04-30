 @extends('frontend.layouts.main')
 @section('main-container')
 <div class="main-wrapper">
     <div class="breadcrumb-wrapper">
         <div class="container">
             <ol class="breadcrumb-list booking-step">
                 <li><a href="job-list.php">All jobs</a></li>
                 <li><a target="_blank" href="">Explore jobs</a></li>
                 <li><span></span></li>
             </ol>
         </div>
     </div>
     <div class="section sm">
         <div class="container">
             <div class="row">
                 <div class="col-md-10 col-md-offset-1">
                     <div class="job-detail-wrapper">
                         <!-- Alert message for success -->
                         @if (session('success'))
                         <div class="alert alert-success">
                             {{ session('success') }}
                         </div>
                         @endif
                         <!-- Alert message for error -->
                         @if (session('error'))
                         <div class="alert alert-danger">
                             {{ session('error') }}
                         </div>
                         @endif
                         <div class="job-detail-header text-center">
                             <h2 class="heading mb-15">{{ $job->job_title }}</h2>
                             <div class="meta-div clearfix mb-25">
                                 @if ($job->employer)
                                 <span>at <a>{{ $job->employer->companyname }}</a></span>
                                 @endif
                                 @if ($job->job_type == 'Full-time')
                                 <span class="label label-warning" style="margin-left: 10px;">{{$job->job_type}}</span>
                                 @elseif ($job->job_type == 'Part-time')
                                 <span class="label label-success" style="margin-left: 10px;">{{$job->job_type}}</span>
                                 @else
                                 <span>{{$job->job_type}}</span>
                                 @endif
                             </div>
                             <ul class="meta-list clearfix">
                                 <li>
                                     <h4 class="heading">Location</h4>
                                     {{$job->city}}
                                 </li>
                                 <li>
                                     <h4 class="heading">Deadline</h4>
                                     {{ (new DateTime($job->closing_date))->format('F j, Y') }}
                                 </li>
                                 <li>
                                     <h4 class="heading">Experience</h4>
                                     {{$job->experience}}
                                 </li>
                                 <li>
                                     <h4 class="heading">Posted</h4>
                                     {{ (new DateTime($job->created_at))->format('F j, Y') }}
                                 </li>
                             </ul>
                         </div>
                         <div class="job-detail-company-overview clearfix">
                             <a href="{{ route('employer.Company', ['employerId' => $employer->id]) }}">
                                 <h3>Company overview</h3>
                                 <div class="image"
                                     style="width: 180px; height: 180px; display: flex; justify-content: center; align-items: center; border-radius: 0;">
                                     @if ($employer->image)
                                     <img src="{{ asset('storage/' . $employer->image) }}" class="square-image"
                                         alt="Employee Image"
                                         style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 0;">
                                     @else
                                     <center>Company Logo Here</center>
                                     @endif
                                 </div>
                                 <p></p>
                             </a>
                         </div>
                         <div class="job-detail-content mt-30 clearfix">
                             <h3>Job Description</h3>
                             <p>{{ $job->job_description }}</p>
                             <h3>Job Responsibilities</h3>
                             <p>{{ $job->job_responsibilities }}</p>
                             <h3>Requirements:</h3>
                             <p>{{ $job->job_requirements }}</p>
                         </div>
                         <div class="apply-job-wrapper">
                             @if (Auth::guard('employer')->check())
                             <a href="{{ route('employee_login_form') }}" class="btn btn-primary">Login as an
                                 Employee</a>
                             @elseif (Auth::guard('employee')->check())
                             @php
                             $alreadyApplied = $employee &&
                             in_array($job->id, $employee->appliedJobs->pluck('job_id')->toArray());
                             @endphp
                             @if ($alreadyApplied)
                             <button class="btn btn-success" disabled>Already Applied</button>
                             @else
                             <form action="{{ route('employee.applyJob', $job->id) }}" method="POST">
                                 @csrf
                                 <button type="submit" class="btn btn-success">Apply for this Job</button>
                             </form>
                             @endif
                             @else
                             <a href="{{ route('employee_login_form') }}" class="btn btn-primary">Login to Apply for
                                 this
                                 Job</a>
                             @endif
                         </div>

                         <div class="tab-style-01">
                             <ul class="nav" role="tablist">
                                 <li role="presentation" class="active">
                                     <h4><a href="#relatedJob1" role="tab" data-toggle="tab">More jobs from
                                             {{ $job->employer->companyname }}</a>
                                     </h4>
                                 </li>
                             </ul>
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="recent-job-wrapper alt-stripe mr-0">
                                         @foreach ($otherJobs as $otherJob)
                                         <div class="recent-job-item clearfix" target="_blank"
                                             href="{{ route('employer.Explore_Job',['id' => $otherJob->id]) }}">
                                             <div class="GridLex-grid-middle">
                                                 <div class="GridLex-col-5_xs-12">
                                                     <div class="job-position">
                                                         <div class="image"
                                                             style="width: 100px; height: 100px; display: flex; justify-content: center; align-items: center; overflow: hidden; margin-right: 10px; border-radius: 4px;">
                                                             @if ($otherJob->employer && $otherJob->employer->image)
                                                             <img src="{{ asset('storage/' . $otherJob->employer->image) }}"
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
                                                                         {{ $otherJob->job_title }}</h4>

                                                                     <span>at
                                                                         <a>{{ $job->employer->companyname }}</a></span>

                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="GridLex-col-5_xs-4_xss-12 mt-10-xss">
                                                     <div class="row">
                                                         <div class="col-xs-6">
                                                             <div class="job-location">
                                                                 <i class="fa fa-map-marker text-primary"></i>
                                                                 -{{ $otherJob->city }}
                                                             </div>
                                                         </div>
                                                         <div class="col-xs-6">
                                                             <div class="apply-job-wrapper"
                                                                 style="margin-top: 10px; margin-left: 120px;">
                                                                 @if (Auth::guard('employee')->check())
                                                                 @php
                                                                 $alreadyApplied = $employee &&
                                                                 in_array($otherJob->id,
                                                                 $employee->appliedJobs->pluck('job_id')->toArray());
                                                                 @endphp
                                                                 @if ($alreadyApplied)
                                                                 <button class="btn btn-success" disabled>Already
                                                                     Applied</button>
                                                                 @else
                                                                 <a href="{{ route('employer.Explore_Job',['id' => $otherJob->id]) }}"
                                                                     class="btn btn-primary">Explore Job</a>
                                                                 @endif
                                                                 @else
                                                                 <a href="{{ route('employer.Explore_Job',['id' => $otherJob->id]) }}"
                                                                     class="btn btn-primary">Explore Job</a>
                                                                 @endif
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         @endforeach
                                         @if ($otherJobs->isEmpty())
                                         <div class="text-center">
                                             <p>No more jobs available</p>
                                         </div>
                                         @endif
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 @endsection
