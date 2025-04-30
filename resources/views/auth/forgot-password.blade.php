@extends('frontend.layouts.main')

@section('main-container')
<div class="login-container-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="login-box-wrapper">
                            <div class="modal-header">
                                <h4 class="modal-title text-center">Restore your forgotten password</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row gap-20">
                                    <form action="{{ route('password.email') }}" method="POST">
                                        @csrf

                                        @if(Session('status'))
                                        <div class="alert alert-warning">
                                            {{Session('status')}}
                                        </div>
                                        @endif
                                        <div class="col-sm-12 col-md-12">
                                            <p class="mb-20">Enter the email address associated with your account,
                                                and we will send you a link to reset your password</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input id="mymail" autocomplete="off" name="email" class="form-control"
                                                placeholder="Enter your email address" type="email"
                                                value="{{old('email')}}" required>
                                        </div>
                                        <div class="login-box-box-action">
                                            Return to <a href="{{ route('employee_login_form') }}">Log-in</a>
                                            <p id="data"></p>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-primary"
                                                name="restore">Restore</button>
                                        </div>
                                    </form>
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

@section('scripts')
<script>
document.getElementById('restore').addEventListener('click', function() {
    document.getElementById('restore-form').submit();
});
</script>
@endsection