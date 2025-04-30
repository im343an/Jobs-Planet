<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use Auth;
use Illuminate\Http\Request;

class EmployersController extends Controller
{
public function index()
{
        $employers = Employer::all();
        $employeeCount = $employers->count();
        return view('frontend.employers', compact('employers', 'employeeCount'));
}

}