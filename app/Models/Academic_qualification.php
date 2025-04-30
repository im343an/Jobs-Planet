<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Academic_qualification extends Model
{
    use HasFactory;
    protected $table = 'academic_qualifications';
    protected $primaryKey = 'id';
public function employee()
{
    return $this->belongsTo(Employee::class, 'employee_id');
}


}