```html
@extends('layouts.app')

@section('title', 'Add Employee')
@section('heading', 'Add New Employee')
@section('subtitle', 'Create a new employee record')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <div>
            <h2>Employee Information</h2>
            <div class="muted">Enter the employee details below.</div>
        </div>
    </div>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        @include('employees._form', [
            'employee' => $employee,
            'buttonText' => 'Save Employee'
        ])
    </form>
</div>

@endsection
```
