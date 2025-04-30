<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Language_proficiency extends Model
{
    use HasFactory;
    protected $table = 'language_proficiencys';
    protected $primaryKey = 'id';
    public function employee()
{
    return $this->belongsTo(Employee::class, 'employee_id');
}
}
