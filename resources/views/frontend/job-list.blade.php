@extends('frontend.layouts.main')

@section('main-container')
<div class="main-wrapper">
    <div class="second-search-result-wrapper">
        <div class="container">
            <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="second-search-result-inner">
                    <span class="labeling">Search a job</span>
                    <div class="row">
                        <div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
                            <div class="form-group form-lg">
                                <select class="form-control" name="category" required>
                                    <option value="">-Select category-</option>
                                    <option style="color:black" value="Accounting">Accounting</option>
                                    <option style="color:black" value="Auditing">Auditing</option>
                                    <option style="color:black" value="Bandking and Finance Services">Bandking and
                                        Finance Services</option>
                                    <option style="color:black" value="CEO and General Management">CEO and General
                                        Management</option>
                                    <option style="color:black" value="Community and SOcial Devt">Community and SOcial
                                        Devt</option>
                                    <option style="color:black" value="Creative and Design">Creative and Design</option>
                                    <option style="color:black" value="Education and Training">Education and Training
                                    </option>
                                    <option style="color:black" value="Engineering and Construction">Engineering and
                                        Construction</option>
                                    <option style="color:black" value="Farming and Agribusiness">Farming and
                                        Agribusiness</option>
                                    <option style="color:black" value="Health and Pharmaceutical">Health and
                                        Pharmaceutical</option>
                                    <option style="color:black" value="HR and Administration">HR and Administration
                                    </option>
                                    <option style="color:black" value="IT and Telecoms">IT and Telecoms</option>
                                    <option style="color:black" value="Legal">Legal</option>
                                    <option style="color:black" value="Manufacturing">Manufacturing</option>
                                    <option style="color:black" value="Marketing, Media and Brand">Marketing, Media and
                                        Brand</option>
                                    <option style="color:black" value="Mining and Natural Resources">Mining and Natural
                                        Resources</option>
                                    <option style="color:black" value="Project and Program Management">Project and
                                        Program Management</option>
                                    <option style="color:black" value="Research, Science and Biotech">Research, Science
                                        and Biotech </option>
                                    <option style="color:black" value="Security">Security</option>
                                    <option style="color:black" value="Strategy and Consulting">Strategy and Consulting
                                    </option>
                                    <option style="color:black" value="Tourism and Travel">Tourism and Travel</option>
                                    <option style="color:black" value="Trade and Services">Trade and Services</option>
                                    <option style="color:black" value="Transport and Logistics">Transport and Logistics
                                    </option>
                                    <option style="color:black" value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
                            <div class="form-group form-lg">
                                <select class="form-control" name="city" required>
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
                        <div class="col-xss-12 col-xs-6 col-sm-4 col-md-2">
                            <button name="search" value="✓" type="submit" class="btn btn-block">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb-list booking-step">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><span>Job-list</span></li>
        </ol>
    </div>
</div>

<div class="section sm">
    <div class="container">
        <div class="sorting-wrappper">
            <div class="sorting-header">
                <h3 class="sorting-title">Job List</h3>
            </div>
        </div>

        <div class="result-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 mt-25">
                    @if (isset($category) && isset($city))
                    <h3>Search Results</h3>
                    <h4>Category: <a>{{ $category }}</a></h4>
                    <h4>City: <a>{{ $city }}</a></h4>
                    </h4>
                    @endif

                    @if ($post_jobs->isEmpty())
                    <p>No jobs found matching the search criteria.</p>
                    @else
                    @foreach ($post_jobs as $job)
                    <div class="result-list-wrapper">
                        <div class="job-item-list">
                            <div class="image"
                                style="width: 120px; height: 120px; display: flex; justify-content: center; align-items: center; overflow: hidden; margin-right: 10px; border-radius: 4px;">
                                @if ($job->employer && $job->employer->image)
                                <img src="{{ asset('storage/' . $job->employer->image) }}" class="square-image"
                                    alt="Employee Image" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                <center>Company Logo Here</center>
                                @endif
                            </div>
                            <div class="content">
                                <div class="job-item-list-info">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-8">
                                            <h4 class="heading">{{ $job->job_title }}</h4>
                                            <div class="meta-div clearfix mb-25">
                                                @if ($job->employer)
                                                <span>at <a>{{ $job->employer->companyname }}</a></span>
                                                @endif
                                                @if ($job->job_type == 'Full-time')
                                                <span class="label label-warning"
                                                    style="margin-left: 10px;">{{ $job->job_type }}</span>
                                                @elseif ($job->job_type == 'Part-time')
                                                <span class="label label-success"
                                                    style="margin-left: 10px;">{{ $job->job_type }}</span>
                                                @else
                                                <span>{{ $job->job_type }}</span>
                                                @endif
                                            </div>
                                            <p class="texing character_limit">{{ $job->job_description }}</p>
                                        </div>
                                        <div class="col-sm-5 col-md-4">
                                            <ul class="meta-list">
                                                <li>
                                                    <span>City:</span>
                                                    {{ $job->city }}
                                                </li>
                                                <li>
                                                    <span>Experience:</span>
                                                    {{ $job->experience }}
                                                </li>
                                                <li>
                                                    <span>Deadline: </span>
                                                    @if (strtotime($job->closing_date) < strtotime(date('Y-m-d'))) <span
                                                        class="expired-deadline">Expired</span>
                                                        @else
                                                        {{ $job->closing_date }}
                                                        @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-item-list-bottom">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-8">
                                            <div class="sub-category">
                                                <a>{{ $job->job_catagory }}</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-md-4">
                                            <a href="{{ route('employer.Explore_Job', ['id' => $job->id]) }}"
                                                class="btn btn-primary">View This Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection