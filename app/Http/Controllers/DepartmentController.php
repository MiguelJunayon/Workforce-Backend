<?php


namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return response()->json($departments);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $department = Department::create($validatedData);

        return response()->json($department, 201);
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return response()->json(null, 204);
    }
}
