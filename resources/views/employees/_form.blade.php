```html
<div class="form-grid">
    <div class="field">
        <label for="name">Full Name</label>
        <input id="name" name="name" type="text"
               value="{{ old('name', $employee->name) }}"
               placeholder="e.g. Muhammad Ali" required>
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="email"
               value="{{ old('email', $employee->email) }}"
               placeholder="employee@company.com" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="department">Department</label>
        <select id="department" name="department" required>
            <option value="">Select department</option>
            @foreach (['Engineering', 'Human Resources', 'Finance', 'Marketing', 'Operations', 'IT Support'] as $department)
                <option value="{{ $department }}"
                    @selected(old('department', $employee->department) === $department)>
                    {{ $department }}
                </option>
            @endforeach
        </select>
        @error('department') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="position">Job Position</label>
        <input id="position" name="position" type="text"
               value="{{ old('position', $employee->position) }}"
               placeholder="e.g. Software Engineer" required>
        @error('position') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="salary">Monthly Salary</label>
        <input id="salary" name="salary" type="number"
               min="0" max="9999999999.99" step="0.01"
               value="{{ old('salary', $employee->salary ?? '0.00') }}"
               required>
        @error('salary') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="status">Employment Status</label>
        <select id="status" name="status" required>
            @foreach (['Active', 'Inactive'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $employee->status ?? 'Active') === $status)>
                    {{ $status }}
                </option>
            @endforeach
        </select>
        @error('status') <span class="error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn">{{ $buttonText }}</button>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
</div>
```
