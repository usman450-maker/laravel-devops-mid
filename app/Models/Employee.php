<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'department',
        'position',
        'salary',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'salary' => 'decimal:2',
        ];
    }
}
