<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Pro_qualification;
use App\Models\Language_proficiency;
use Illuminate\Support\Facades\Hash;
use App\Models\Training;
use App\Models\Academic_qualification;
use App\Models\Experience;
use App\Models\Attachment;
use App\Models\AppliedJob;
use App\Models\Post_job;
use App\Models\Employer;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function Index()
    {
        return view('employee.employee_login');
    }
   public function ChangePassword()
{
    $employee = Employee::find(Auth::guard('employee')->id());
    return view('employee.change-password', compact('employee'));
}

public function AcademicQualifications()
{
    $employeeId = Auth::guard('employee')->id();

    $employee = Employee::find($employeeId);

    $academicQualifications = $employee->academicQualifications;
    $data = compact('academicQualifications', 'employee');

    return view('employee.academic-qualifications', $data);
}
public function applyJob(Request $request, $jobId)
{
    $employee = Auth::guard('employee')->user();

    // Check if the employee has already applied for the job
    $appliedJob = AppliedJob::where('employee_id', $employee->id)->where('job_id', $jobId)->first();

    if ($appliedJob) {
        // Employee has already applied for the job
        return redirect()->back()->with('error', 'You have already applied for this job.');
    }

    // Apply for the job
    $job = Post_Job::findOrFail($jobId);
    $appliedJob = new AppliedJob();
    $appliedJob->employee_id = $employee->id;
    $appliedJob->job_id = $job->id;
    $appliedJob->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'You have successfully applied for the job.');
}

    public function appliedJobs()
    {
        // Get the authenticated employee
        $employeeId = Auth::guard('employee')->id();

        // Retrieve the applied jobs for the employee with employer and job information
        $appliedJobs = AppliedJob::where('employee_id', $employeeId)->with('job.employer')->get();

        $employee = Employee::find($employeeId);

        return view('employee.applied-jobs', compact('appliedJobs', 'employee'));
    }
        public function Attachment()
    {
        $employeeId = Auth::guard('employee')->id();
        $employee = Employee::find($employeeId);
        $attachments = $employee->attachments;
        $data = compact('attachments', 'employee');
        return view('employee.attachment')->with($data);
    }
        public function Experience()
    {
        $employeeId = Auth::guard('employee')->id();
        $employee = Employee::find($employeeId);
        $experiences = $employee->experiences;
        $data = compact('experiences', 'employee');
        return view('employee.experience')->with($data);
    }
        public function LanguageProficiency()
    {
        $employeeId = Auth::guard('employee')->id();
        $employee = Employee::find($employeeId);
        $language_proficiencys = $employee->language_proficiencys;
        $data = compact('language_proficiencys', 'employee');
        return view('employee.language-proficiency')->with($data);
    }
        public function Qualifications()
    {
        $employeeId = Auth::guard('employee')->id();
        $employee = Employee::find($employeeId);
        $pro_qualifications = $employee->pro_qualifications;
        $data = compact('pro_qualifications', 'employee');
        return view('employee.qualifications')->with($data);
    }
        public function Training()
    {
        $employeeId = Auth::guard('employee')->id();
        $employee = Employee::find($employeeId);
        $trainings = $employee->trainings;
        $data = compact('trainings', 'employee');
        return view('employee.training')->with($data);
    }
        public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }
    public function employee_detail($employeeId)
    {
        $employee = Employee::find($employeeId);
        $academic_qualifications = Academic_qualification::all();

        if (!$employee) {
            abort(404);
        }

        return view('employee.employee_detail', compact('employee', 'academic_qualifications'));
    }
    public function Dashboard()
    {
        $employee = Employee::find(Auth::guard('employee')->id());
        date_default_timezone_set('Asia/Karachi');
        $pakistanTime = Carbon::now();
        $employee->last_login = $pakistanTime;
        $employee->save();
        return view('employee.index', compact('employee'));

    }
    public function Login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if(Auth::guard('employee')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('employee.dashboard')->with('success','Login Successfully');
        }
        else{
            return redirect()->back()->with('error','Invalid Email or Password');
        }
    }
    public function EmployeeRegister()
    {
        return view('employee.employee_register');
    }
    public function EmployeeRegisterCreate(Request $request)
    {
        // dd($request->all());
         $employer = Employer::where('email', $request->email)->first();

        if ($employer) {
            return redirect()->route('employee.register')->with('error', 'This email is already registered as an employer.');
        }
        $employee = new Employee;
        $employee->firstname = $request['firstname'];
        $employee->lastname = $request['lastname'];
        $employee->email = $request['email'];
        $employee->password = Hash::make($request['password']);
        $employee->confirmpassword = Hash::make($request['confirmpassword']);
        $employee->save();

        return redirect()->route('employee_login_form')->with('success','Account created successfully, now you can login');
    }
    public function EmployeeRegister_update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (is_null($employee)) {
            return redirect()->back();
        }

        $employee->update($request->all());

        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->born = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
        $employee->education = $request->input('education');
        $employee->title = $request->input('title');
        $employee->gender = $request->input('gender');
        $employee->city = $request->input('city');
        $employee->street = $request->input('street');
        $employee->zip = $request->input('zip');
        $employee->phone = $request->input('phone');
        $employee->about = $request->input('about');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('employee_image', 'public');
            $employee->file = $filePath;
        }

        $employee->save();

        return redirect()->back()->with('success', 'Profile Updated successfully.');
    }
    public function calculateAge()
    {
        $birthDate = $this->born;
        $currentDate = now()->format('Y-m-d');

        $age = date_diff(date_create($birthDate), date_create($currentDate))->y;

        return $age;
    }
    public function EmployeeRegister_uploadimage(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (is_null($employee)) {
            return redirect()->back();
        }

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image);
            }

            $image = $request->file('image');
            $filePath = $image->store('employee_images', 'public');
            $employee->image = $filePath;
        }

        $employee->save();

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
    public function EmployeeLogout()
    {
        Auth::guard('employee')->logout();
            return redirect()->route('home');

    }
    public function UpdatePassword(Request $request)
    {
    $request->validate([
        'password' => 'required|string|min:8|confirmed',
    ]);

    $employee = Auth::guard('employee')->user();
    $employee->password = Hash::make($request->password);
    $employee->save();

    return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function Qualifications_Add(Request $request)
    {
        // Validate the input fields here...
        $employeeId = Auth::guard('employee')->id();

        $pro_qualifications = new Pro_qualification;
        $pro_qualifications->course = $request->input('course');
        $pro_qualifications->institution = $request->input('institution');
        $pro_qualifications->city = $request->input('city');

        // Extract the year range from the input
        $pro_qualifications->timeframe = $request->input('timeframe');
        $pro_qualifications->employee_id = Auth::guard('employee')->id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('Professioan-Qualification', 'public');
            $pro_qualifications->file = $filePath;
        }

        $pro_qualifications->save();
        return redirect()->back()->with('success', 'Qualification Added successfully.');

    }

    public function Qualifications_destroy($id){
        $pro_qualifications = Pro_qualification::find($id);
        if(!is_null($pro_qualifications)){
            $pro_qualifications->delete();
        }
        return redirect()->back()->with('success', 'Qualification deleted successfully.');
    }
     public function Qualifications_update(Request $request, $id)
    {
        $employeeId = Auth::guard('employee')->id();
        $pro_qualification = Pro_qualification::find($id);
        if (is_null($pro_qualification)) {
            return redirect()->back();
        }
        $employeeId = Auth::guard('employee')->id();

        $pro_qualification->course = $request->input('course');
        $pro_qualification->institution = $request->input('institution');
        $pro_qualification->timeframe = $request->input('timeframe');
        $pro_qualification->city = $request->input('city');
        $pro_qualification->employee_id = Auth::guard('employee')->id();

        if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('uploads', 'public');
                $pro_qualification->file = $filePath;
            }

        $pro_qualification->save();

        return redirect()->back()->with('success', 'Qualification Updated successfully.');
    }
    public function LanguageProficiency_Add(Request $request)
    {
        // Validate the input fields here...

        $employeeId = Auth::guard('employee')->id();
        $language_proficiencys = new Language_proficiency;
        $language_proficiencys->language = $request->input('language');
        $language_proficiencys->speak = $request->input('speak');
        $language_proficiencys->read = $request->input('read');
        $language_proficiencys->write = $request->input('write');
        $language_proficiencys->employee_id = Auth::guard('employee')->id();

        $language_proficiencys->save();
        return redirect()->back()->with('success', 'Language have been added');

    }
    public function LanguageProficiency_update(Request $request, $id)
{
    $employeeId = Auth::guard('employee')->id();
    $language_proficiencys = Language_proficiency::find($id);
    if (is_null($language_proficiencys)) {
        return redirect()->back();
    }

    $language_proficiencys->language = $request->input('language');
    $language_proficiencys->speak = $request->input('speak');
    $language_proficiencys->read = $request->input('read');
    $language_proficiencys->write = $request->input('write');
    $language_proficiencys->employee_id = Auth::guard('employee')->id();

    $language_proficiencys->save();

    return redirect()->back()->with('success', 'Languagae Updated successfully.');
    }
    public function LanguageProficiency_destroy($id){
        $language_proficiencys = Language_proficiency::find($id);
        if(!is_null($language_proficiencys)){
            $language_proficiencys->delete();
        }
        return redirect()->back()->with('success', 'Language deleted successfully.');
    }
        public function Training_Add(Request $request)
    {
        // Validate the input fields here...

        $employeeId = Auth::guard('employee')->id();
        $trainings = new Training;
        $trainings->training_name = $request->input('training_name');
        $trainings->training_institution = $request->input('training_institution');
        $trainings->timeframe = $request->input('timeframe');
        $trainings->employee_id = Auth::guard('employee')->id();

        // Extract the year range from the input
        $trainings->timeframe = $request->input('timeframe');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('Workshop and trainings', 'public');
            $trainings->file = $filePath;
        }

        $trainings->save();
        return redirect()->back()->with('success', 'Workshop or training Added successfully.');

    }

        public function Training_update(Request $request, $id)
    {
    $employeeId = Auth::guard('employee')->id();
    $trainings = Training::find($id);
    if (is_null($trainings)) {
        return redirect()->back();
    }

    $trainings->training_name = $request->input('training_name');
    $trainings->training_institution = $request->input('training_institution');
    $trainings->timeframe = $request->input('timeframe');
    $trainings->employee_id = Auth::guard('employee')->id();

    if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('Workshop and trainings', 'public');
            $trainings->file = $filePath;
        }

    $trainings->save();

    return redirect()->back()->with('success', 'Workshop or training Updated successfully.');
    }

     public function Training_destroy($id){
        $trainings = Training::find($id);
        if(!is_null($trainings)){
            $trainings->delete();
        }
        return redirect()->back()->with('success', 'Workshop or training deleted successfully.');
    }
         public function AcademicQualifications_Add(Request $request)
    {
    // Validate the input fields here...
        $employeeId = Auth::guard('employee')->id();

        $academic_qualification = new Academic_qualification;
        $academic_qualification->education = $request->input('education');
        $academic_qualification->city = $request->input('city');
        $academic_qualification->institution = $request->input('institution');
        $academic_qualification->course = $request->input('course');
        $academic_qualification->timeframe = $request->input('timeframe');

        // Extract the year range from the input
        $academic_qualification->timeframe = $request->input('timeframe');
        $academic_qualification->employee_id = Auth::guard('employee')->id();
        if ($request->hasFile('file')) {
            // Delete the previous image if it exists
            if ($academic_qualification->file) {
                Storage::disk('public')->delete($academic_qualification->file);
            }

            $file = $request->file('file');
            $filePath = $file->store('employee_images', 'public');
            $academic_qualification->file = $filePath;
        }

        $academic_qualification->save();
        return redirect()->back()->with('success', 'Qualification Added successfully.');
    }
    public function AcademicQualifications_update(Request $request, $id)
{
    $employeeId = Auth::guard('employee')->id();
    $academic_qualification = Academic_qualification::find($id);

    if (is_null($academic_qualification)) {
        return redirect()->back();
    }

    $academic_qualification->education = $request->input('education');
    $academic_qualification->city = $request->input('city');
    $academic_qualification->institution = $request->input('institution');
    $academic_qualification->course = $request->input('course');
    $academic_qualification->timeframe = $request->input('timeframe');
    $academic_qualification->employee_id = Auth::guard('employee')->id();

    if ($request->hasFile('file')) {
        // Delete the previous image if it exists
        if ($academic_qualification->file) {
            Storage::disk('public')->delete($academic_qualification->file);
        }

        $file = $request->file('file');
        $filePath = $file->store('employee_images', 'public');
        $academic_qualification->file = $filePath;
    }

    $academic_qualification->save();

    return redirect()->back()->with('success', 'Academic qualification updated successfully.');
}

    public function AcademicQualifications_destroy($id){
        $academic_qualifications = Academic_qualification::find($id);
        if(!is_null($academic_qualifications)){
            $academic_qualifications->delete();
        }
        return redirect()->back()->with('success', 'Qualification deleted successfully.');
    }
        public function Experience_Add(Request $request)
    {
        // Validate the input fields here...
        $employeeId = Auth::guard('employee')->id();

        $experiences = new Experience;
        $experiences->institution = $request->input('institution');
        $experiences->supervisor = $request->input('supervisor');
        $experiences->supervisor_telephone = $request->input('supervisor_telephone');
        $experiences->job_title = $request->input('job_title');
        $experiences->Start_date = $request->input('Start_date');
        $experiences->End_date = $request->input('End_date');
        $experiences->Duties = $request->input('Duties');
        $experiences->employee_id = Auth::guard('employee')->id();

        $experiences->save();
        return redirect()->back()->with('success', 'Experience have been added');

    }
        public function Experience_update(Request $request, $id)
    {
        $employeeId = Auth::guard('employee')->id();
        $experiences = Experience::find($id);
        if (is_null($experiences)) {
            return redirect()->back();
        }

        $experiences->institution = $request->input('institution');
        $experiences->supervisor = $request->input('supervisor');
        $experiences->supervisor_telephone = $request->input('supervisor_telephone');
        $experiences->job_title = $request->input('job_title');
        $experiences->Start_date = $request->input('Start_date');
        $experiences->End_date = $request->input('End_date');
        $experiences->Duties = $request->input('Duties');
        $experiences->employee_id = Auth::guard('employee')->id();

    $experiences->save();

    return redirect()->back()->with('success', 'Experience Updated successfully.');
    }
        public function Experience_destroy($id){
        $experiences = Experience::find($id);
        if(!is_null($experiences)){
            $experiences->delete();
        }
        return redirect()->back()->with('success', 'Experience deleted successfully.');
    }
    public function Attachment_Add(Request $request)
    {
        // Validate the input fields here...
        $employeeId = Auth::guard('employee')->id();
        $attachments = new Attachment;
        $attachments->attachment = $request->input('attachment');
        $attachments->issuer = $request->input('issuer');
        $attachments->employee_id = Auth::guard('employee')->id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('Attachments', 'public');
            $attachments->file = $filePath;
        }

        $attachments->save();
        return redirect()->back()->with('success', 'Attachment Added successfully.');

    }
        public function Attachment_update(Request $request, $id)
    {
    $attachments = Attachment::find($id);
    if (is_null($attachments)) {
        return redirect()->back();
    }

        $attachments->attachment = $request->input('attachment');
        $attachments->issuer = $request->input('issuer');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('Attachments', 'public');
            $attachments->file = $filePath;
        }

    $attachments->save();

    return redirect()->back()->with('success', 'Attachment Updated successfully.');
    }
    public function Attachment_destroy($id){
        $attachments = Attachment::find($id);
        if(!is_null($attachments)){
            $attachments->delete();
        }
        return redirect()->back()->with('success', 'Experience deleted successfully.');
    }
}