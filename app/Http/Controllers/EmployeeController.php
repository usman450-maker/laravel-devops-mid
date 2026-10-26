<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(8);

        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('status', 'Active')->count();
        $departments = Employee::distinct('department')->count('department');
        $totalPayroll = Employee::sum('salary');

        return view('employees.index', compact(
            'employees',
            'totalEmployees',
            'activeEmployees',
            'departments',
            'totalPayroll'
        ));
    }

    public function create()
    {
        return view('employees.create', [
            'employee' => new Employee(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email'],
            'department' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'salary' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'status' => ['required', Rule::in(['Active', 'Inactive'])],
        ]);

        Employee::create($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('employees', 'email')->ignore($employee->id),
            ],
            'department' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'salary' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'status' => ['required', Rule::in(['Active', 'Inactive'])],
        ]);

        $employee->update($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}

