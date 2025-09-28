<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClearanceItem;
use Illuminate\Http\Request;

class ClearanceItemController extends Controller
{
    public function complete(Request $request, ClearanceItem $clearanceItem)
    {
        $clearanceItem->update([
            'status' => 'completed',
            'completedBy' => $request->input('completedBy', 'HR'),
            'completedAt' => now(),
            'signature' => $request->signature,
            'remarks' => $request->remarks,
        ]);

        return $clearanceItem;
    }
}

