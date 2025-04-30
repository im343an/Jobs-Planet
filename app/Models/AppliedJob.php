<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post_Job;
use App\Models\Employee;

class AppliedJob extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsTo(Post_Job::class, 'job_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}