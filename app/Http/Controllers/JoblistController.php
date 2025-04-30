<?php

namespace App\Http\Controllers;

use App\Models\Post_job;
use Illuminate\Http\Request;

class JoblistController extends Controller
{
    public function index()
    {
        $post_jobs = Post_job::with('employer')->get();

        return view('frontend.job-list', compact('post_jobs'));
    }





}
