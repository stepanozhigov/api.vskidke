<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'first_name','last_name','birthday','email','phone'
    ];

    public function projects() {
        return $this->belongsToMany('App\Models\Project','employees_projects','employee_id','project_id');
    }
}
