<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Academic_qualification;
use App\Models\Attachment;
use App\Models\Experience;
use App\Models\Language_proficiency;
use App\Models\Pro_qualification;
use App\Models\Training;
use App\Models\AppliedJob;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'employee';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'status'
    ];

    public function academicQualifications()
    {
        return $this->hasMany(Academic_qualification::class, 'employee_id');
    }

    public function pro_qualifications()
    {
        return $this->hasMany(Pro_qualification::class, 'employee_id');
    }

    public function language_proficiencys()
    {
        return $this->hasMany(Language_proficiency::class, 'employee_id');
    }

    public function trainings()
    {
        return $this->hasMany(Training::class, 'employee_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'employee_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'employee_id');
    }

    public function appliedJobs()
    {
        return $this->hasMany(AppliedJob::class, 'employee_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}