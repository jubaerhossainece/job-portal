<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $jobs = DB::table('jobs')->where('is_active', true)->count();
        $job_types = DB::table('job_types')->count();
        return view('admin.dashboard', compact('jobs', 'job_types'));
    }
}
