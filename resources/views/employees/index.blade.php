```html
@extends('layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Company Dashboard')
@section('subtitle', 'Overview of your workforce and operations')

@section('content')

<div class="stats">
    <div class="stat">
        <div class="stat-label">Total Employees</div>
        <div class="stat-value">{{ number_format($totalEmployees) }}</div>
        <div class="stat-note">Registered workforce</div>
    </div>

    <div class="stat">
        <div class="stat-label">Active Employees</div>
        <div class="stat-value">{{ number_format($activeEmployees) }}</div>
        <div class="stat-note">Currently active</div>
    </div>

    <div class="stat">
        <div class="stat-label">Departments</div>
        <div class="stat-value">{{ number_format($departments) }}</div>
        <div class="stat-note">Across the organization</div>
    </div>

    <div class="stat">
        <div class="stat-label">Monthly Payroll</div>
        <div class="stat-value">{{ number_format($totalPayroll, 0) }}</div>
        <div class="stat-note">Total recorded salary</div>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <div>
            <h2>Employee Directory</h2>
            <div class="muted">Manage employee details and employment status.</div>
        </div>

        <a href="{{ route('employees.create') }}" class="btn">
            + Add Employee
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>
                            <div class="employee-name">{{ $employee->name }}</div>
                            <div class="employee-email">{{ $employee->email }}</div>
                        </td>

                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ number_format((float) $employee->salary, 2) }}</td>

                        <td>
                            <span class="badge {{ $employee->status === 'Active' ? 'badge-active' : 'badge-inactive' }}">
                                {{ $employee->status }}
                            </span>
                        </td>

                        <td>
                            <div class="actions">
                                <a href="{{ route('employees.edit', $employee) }}"
                                   class="btn btn-secondary">Edit</a>

                                <form action="{{ route('employees.destroy', $employee) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this employee?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty">
                                <h3>No employees yet</h3>
                                <p>Add your first employee to populate the dashboard.</p>
                                <a href="{{ route('employees.create') }}" class="btn">
                                    Add First Employee
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $employees->links() }}
    </div>
</div>

@endsection
```
