<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     */
    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create($request->all());

        return response()->json($employee,201);
    } 

    /**
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return response()->json($employee,200);
    }

    /**
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json('employee deleted',200);
    }
}
