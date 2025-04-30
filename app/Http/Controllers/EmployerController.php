<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;
use App\Models\Employer;
use App\Models\Post_job;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\AppliedJob;
class EmployerController extends Controller
{
    public function Index()
    {

        return view('employer.employer_login');
    }
    public function ChangePassword()
    {
        $employer = Employer::find(Auth::guard('employer')->id());
        return view('employer.change-password', compact('employer'));
    }
    public function company($employerId)
    {
        $employer = Employer::find($employerId);

        if (!$employer) {
            abort(404);
        }

        $post_jobs = $employer->post_jobs()->where('status', 'active')->get();
        $activeJobCount = $post_jobs->count();

        return view('employer.company', compact('employer', 'post_jobs', 'activeJobCount'));
    }

public function View_Applicants($jobId)
{
    $job = Post_Job::findOrFail($jobId);

    $employeeId = Auth::guard('employee')->id();

    $alreadyApplied = AppliedJob::where('job_id', $jobId)
        ->where('employee_id', $employeeId)
        ->exists();

    $applicants = $job->appliedJobs()->with('employee')->get();

    return view('employer.view-applicants', compact('applicants', 'alreadyApplied'));
}
         public function My_Jobs($employerId)
    {
         $employer = Employer::find($employerId);
    if (!$employer) {
        abort(404);
    }
    $post_jobs = $employer->post_jobs()->where('status', 'active')->get();
    $activeJobCount = $post_jobs->count();
    return view('employer.my-jobs', compact('employer', 'post_jobs', 'activeJobCount'));
    }
        public function Post_Jobs()
    {
       $employer = Employer::find(Auth::guard('employer')->id());
        return view('employer.post-job', compact('employer'));
    }
    public function Dashboard()
    {
    $employer = Employer::find(Auth::guard('employer')->id());
    date_default_timezone_set('Asia/Karachi');
    $pakistanTime = Carbon::now();
    $employer->last_login = $pakistanTime;
    $employer->save();
    return view('employer.index', compact('employer'));

    }
    public function Login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if(Auth::guard('employer')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('employer.dashboard')->with('error','Employee Login Successfully');
        }
        else{
            return redirect()->back()->with('error','Invalid Email or Password');
        }
    }
    public function EmployerRegister()
    {
        return view('employer.employer_register');
    }
    public function EmployerRegisterCreate(Request $request)
    {
         $employee = Employee::where('email', $request->email)->first();

        if ($employee) {
            return redirect()->route('employer.register')->with('error', 'This email is already registered as an employee.');
        }
        Employer::insert([
            'companyname' => $request->companyname,
            'companytype' => $request->companytype,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmpassword' => Hash::make($request->confirmpassword),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('employer_login_form');
    }
   public function EmployerRegister_update(Request $request, $id)
{
    $employerId = Auth::guard('employer')->id();
    $employer = Employer::find($id);
    if (is_null($employer)) {
        return redirect()->back();
    }
    $employer->update($request->all());
    // Update employer details
    $employer->companyname = $request->input('companyname');
    $employer->establish = $request->input('establish');
    $employer->companytype = $request->input('companytype');
    $employer->people = $request->input('people');
    $employer->website = $request->input('website');
    $employer->city = $request->input('city');
    $employer->street = $request->input('street');
    $employer->zip = $request->input('zip');
    $employer->phone = $request->input('phone');
    $employer->email = $request->input('email');
    $employer->background = $request->input('background');
    $employer->services = $request->input('services');
    $employer->expertise = $request->input('expertise');
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filePath = $file->store('employer_image', 'public');
        $employer->file = $filePath;
    }
    $post_jobs = $employer->postJobs;
    $employer->save();
    return view('employer.index', compact('employer', 'post_jobs'))->with('success', 'Profile updated successfully.');
}
public function EmployerRegister_uploadimage(Request $request, $id)
{
    $employer = Employer::find($id);
    if (is_null($employer)) {
        return redirect()->back();
    }
    if ($request->hasFile('image')) {
        // Delete the previous image if it exists
        if ($employer->image) {
            Storage::disk('public')->delete($employer->image);
        }
        $image = $request->file('image');
        $filePath = $image->store('employer_images', 'public'); 
        $employer->image = $filePath;
    }
    $employer->save();
    return redirect()->back()->with('success', 'Image uploaded successfully.');
}
    public function EmployerLogout()
    {
        Auth::guard('employer')->logout();
            return redirect()->route('home');
    }
    public function UpdatePassword(Request $request)
    {
    $request->validate([
        'password' => 'required|string|min:8|confirmed',
    ]);

    $employer = Auth::guard('employer')->user();
    $employer->password = Hash::make($request->password);
    $employer->save();

    return redirect()->back()->with('success', 'Password updated successfully');
    }

public function Post_Jobs_form(Request $request)
{
    // Get the currently authenticated employer's ID
    $employerId = Auth::guard('employer')->id();

    $post_jobs = new Post_job;
    $post_jobs->job_title = $request->input('job_title');
    $post_jobs->city = $request->input('city');
    $post_jobs->job_catagory = $request->input('job_catagory');
    $post_jobs->closing_date = date('Y-m-d', strtotime($request->input('closing_date')));
    $post_jobs->job_type = $request->input('job_type');
    $post_jobs->experience = $request->input('experience');
    $post_jobs->job_description = $request->input('job_description');
    $post_jobs->job_responsibilities = $request->input('job_responsibilities');
    $post_jobs->job_requirements = $request->input('job_requirements');

    // Set the employer_id to associate the job with the authenticated employer
    $post_jobs->employer_id = $employerId;

    // Check if the closing date is in the past
    if (strtotime($post_jobs->closing_date) < strtotime(date('Y-m-d'))) {
        // Mark the job as expired
        $post_jobs->expired = true;
    }

    $post_jobs->save();

    return redirect()->back()->with('success', 'Your job advertisement has been posted successfully');
}


public function Edit_Post_Jobs_form(Request $request, $id)
{
    // Get the currently authenticated employer's ID
    $employerId = Auth::guard('employer')->id();

    $employer = Employer::find($employerId);
    $post_jobs = Post_job::find($id);
    if (is_null($post_jobs)) {
        return redirect()->back();
    }

    $post_job = Post_Job::where('employer_id', $employerId)->where('id', $id)->first();
    // dd($post_job);


    $data = ['post_job' => $post_job, 'employer' => $employer];
    return view('employer.Edit_Post_Jobs_form', $data);
}

public function Edit_Post_Jobs(Request $request, $id)
{
    // Get the currently authenticated employer's ID
    $employerId = Auth::guard('employer')->id();

   $post_jobs = Post_job::find($id);
    if (is_null($post_jobs)) {
        return redirect()->back();
    }

    $post_jobs->job_title = $request->input('job_title');
    $post_jobs->city = $request->input('city');
    $post_jobs->job_catagory = $request->input('job_catagory');
    $post_jobs->closing_date = date('Y-m-d', strtotime($request->input('closing_date')));
    $post_jobs->job_type = $request->input('job_type');
    $post_jobs->experience = $request->input('experience');
    $post_jobs->job_description = $request->input('job_description');
    $post_jobs->job_responsibilities = $request->input('job_responsibilities');
    $post_jobs->job_requirements = $request->input('job_requirements');
    $post_jobs->save();


    return redirect()->back()->with('success', 'Post job updated successfully');
}
    public function Delete_Post_Jobs($id){
        $post_jobs = Post_job::find($id);
        if(!is_null($post_jobs)){
            $post_jobs->delete();
        }
        return redirect()->back()->with('success', 'Job deleted successfully.');
    }
public function Explore_Job($id)
{
    // Get the job being explored
    $job = Post_Job::findOrFail($id);

    // Get the employer of the job
    $employer = $job->employer;

    // Get other jobs from the same employer
    $otherJobs = Post_Job::where('employer_id', $employer->id)
        ->where('id', '!=', $job->id)
        ->get();

    // Check if the job is expired
    $isExpired = strtotime($job->closing_date) < strtotime(date('Y-m-d'));

    // Check if an employee is logged in
    $employee = null;
    if (Auth::guard('employee')->check()) {
        $employee = Auth::guard('employee')->user();
    }

    $data = [
        'job' => $job,
        'employer' => $employer,
        'otherJobs' => $otherJobs,
        'employee' => $employee,
        'isExpired' => $isExpired, // Pass the isExpired variable to the view
    ];

    return view('employer.explore-job', $data);
}
public function search(Request $request)
{
    $category = $request->input('category');
    $city = $request->input('city');

    // Perform the search based on the selected category and city
    $query = Post_job::query();

    if (!empty($category)) {
        $query->where('job_catagory', $category);
    }

    if (!empty($city)) {
        $query->where('city', $city);
    }

    $post_jobs = $query->get();

    // Pass the search results to the view
    return view('frontend.job-list', compact('post_jobs', 'category', 'city'));
}








}