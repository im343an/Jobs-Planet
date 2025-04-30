<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use App\Models\Post_job;

use Illuminate\Http\Request;

class indexController extends Controller
{
 public function index()
    {
        $employers = Employer::all(); // Fetch all employers
        $post_jobs = Post_job::all(); // Fetch all jobs

        return view('frontend.index', compact('employers', 'post_jobs'));
    }

}