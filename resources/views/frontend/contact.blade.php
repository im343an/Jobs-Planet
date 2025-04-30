@extends('frontend.layouts.main')
@section('main-container')
<div class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb-list">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><span>Contact Us</span></li>
        </ol>
    </div>
</div>
<div class="section sm">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="section-title">
                    <h2>Contact us for help</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 col-md-6 col-md-offset-1 mb-30">
                <form action="{{route('Contact_us')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName">Your Name <span
                                        class="font10 text-danger">(required)</span></label>
                                <input id="inputName" name="name" type="text" class="form-control"
                                    data-error="Your name is required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputEmail">Your Email <span
                                        class="font10 text-danger">(required)</span></label>
                                <input id="inputEmail" name="email" type="email" class="form-control"
                                    data-error="Your email is required and must be a valid email address" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputMessage">Message <span
                                        class="font10 text-danger">(required)</span></label>
                                <textarea id="inputMessage" name="message" class="form-control" rows="8"
                                    data-minlength="50"
                                    data-error="Your message is required and must not less than 50 characters"
                                    required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary mt-5">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-5 col-md-4">
                <ul class="address-list">
                    <li>
                        <h5>Address</h5>
                        <address> Jinnah Colony<br />Faisalabad</address>
                    </li>
                    <li>
                        <h5>Email</h5><a href="">hello@nightingale.com</a>
                    </li>
                    <li>
                        <h5>Phone Number</h5><a href="">+92 331 3437100</a>
                    </li>

                    <li>
                        <h5>Social Networks</h5>
                        <div class="contact-social">
                            <a href="" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection