<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;

class JobManipulationController extends Controller
{
    public function changeStatus($id){
        $job = Job::findOrFail($id);
        
        $job->is_active = !$job->is_active;
        $job->save();

        return response()->json([
            'status' => $job->is_active
        ]);
    }
}
