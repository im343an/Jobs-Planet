<?php

// app/Http/Controllers/ForgotPasswordController.php

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
     public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // Override the sendResetLinkEmail method
}
