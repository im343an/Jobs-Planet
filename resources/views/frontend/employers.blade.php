@extends('frontend.layouts.main')

@section('main-container')
<div class="main-wrapper">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb-list booking-step">
                <li><a href="./">Home</a></li>
                <li><span>Employers</span></li>
            </ol>
        </div>
    </div>
    <div class="section sm">
        <div class="container">
            <div class="sorting-wrappper alt">
                <div class="GridLex-grid-middle">
                    <div class="GridLex-col-3_sm-12_xs-12">
                        <div class="sorting-header">
                            <h3 class="sorting-title">Employers</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company-grid-wrapper top-company-2-wrapper">
                <div class="GridLex-gap-30">
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @foreach($employers as $employer)
                        <div class="GridLex-col-3_sm-4_xs-6_xss-12">
                            <div class="top-company-2">
                                <a href="{{ route('employer.Company', ['employerId' => $employer->id]) }}">
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
                                    <div class="content">
                                        <h5 class="heading text-primary font700">{{ $employer->companyname }}</h5>
                                        <p class="texting font600">{{ $employer->companytype }}</p>
                                        <p class="mata-p clearfix">
                                            <span
                                                class="text-primary font700">{{ $employer->post_jobs()->where('status', 'active')->count() }}</span>
                                            <span class="font13">Active job post(s)</span>
                                            <span class="pull-right icon"><i class="fa fa-long-arrow-right"></i></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="pager-wrapper">
            <ul class="pager-list">
            </ul>
        </div>
    </div>
</div>
@endsection