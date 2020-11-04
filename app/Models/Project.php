<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name','description'
    ];

    public function employees() {
        return $this->belongsToMany('App\Models\Employee','employees_projects','project_id','employee_id');
    }
}
