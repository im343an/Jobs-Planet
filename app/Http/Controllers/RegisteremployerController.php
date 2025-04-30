<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employerregisteration;

class RegisteremployerController extends Controller
{
     public function index()
    {
        return view('frontend.registeremployer');
    }
}