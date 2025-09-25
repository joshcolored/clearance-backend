<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearanceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'department', 'taskName', 'description',
        'status', 'assignedTo', 'completedBy', 'completedAt', 'signature', 'remarks'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
