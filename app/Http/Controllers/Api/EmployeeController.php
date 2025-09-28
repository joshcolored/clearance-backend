<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\ClearanceItem;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::with('clearanceItems')->get();
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());

        // Generate clearance tasks
        $tasks = [
            ['department' => 'hr', 'taskName' => 'Final Pay Calculation', 'description' => 'Calculate final salary and benefits'],
            ['department' => 'hr', 'taskName' => 'Exit Interview', 'description' => 'Conduct exit interview and documentation'],
            ['department' => 'it', 'taskName' => 'System Access Revocation', 'description' => 'Revoke all system access'],
            ['department' => 'it', 'taskName' => 'Equipment Return', 'description' => 'Return IT equipment'],
            ['department' => 'team_leader', 'taskName' => 'Project Handover', 'description' => 'Hand over ongoing projects'],
            ['department' => 'engineering_auxiliary', 'taskName' => 'Company ID Return', 'description' => 'Return company ID badge and removed from access list'],
            ['department' => 'engineering_auxiliary', 'taskName' => 'Headset Return', 'description' => 'Return headset and other equipment'],


        ];

        foreach ($tasks as $task) {
            ClearanceItem::create([
                'employee_id' => $employee->id,
                'status' => 'pending',
                ...$task
            ]);
        }

        return response()->json($employee->load('clearanceItems'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return $employee->load('clearanceItems');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
    public function updateStatus(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:in_clearance,completed',
        ]);

        $employee->status = $validated['status'];
        $employee->save();

        return response()->json($employee);
    }
}
