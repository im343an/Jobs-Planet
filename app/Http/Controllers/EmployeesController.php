<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Auth;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $employeeCount = $employees->count();
        return view('frontend.employees', compact('employees', 'employeeCount'));
    }
}