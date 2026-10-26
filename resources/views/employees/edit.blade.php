```html
@extends('layouts.app')

@section('title', 'Edit Employee')
@section('heading', 'Edit Employee')
@section('subtitle', 'Update employee information')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <div>
            <h2>{{ $employee->name }}</h2>
            <div class="muted">Employee ID: #{{ $employee->id }}</div>
        </div>
    </div>

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        @include('employees._form', [
            'employee' => $employee,
            'buttonText' => 'Update Employee'
        ])
    </form>
</div>

@endsection
```
