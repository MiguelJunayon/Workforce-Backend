<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        
        $employees = Employee::all();

        return response()->json($employees);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
           
        ]);

      
        $employee = Employee::create($validatedData);

        return response()->json($employee, 201);
    }

    public function destroy(Employee $employee)
    {
      
        $employee->delete();

        return response()->json(null, 204);
    }
}
