<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employer;
use App\Models\AppliedJob;
use App\Models\Applicant;

class Post_Job extends Model
{
    use HasFactory;

    protected $table = 'post_jobs';
    protected $primaryKey = 'id';

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function appliedJobs()
    {
        return $this->hasMany(AppliedJob::class, 'job_id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}