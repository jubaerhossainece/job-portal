<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('is_active', true)->select('id', 'title', 'job_types_id', 'description')->paginate(5);
         $applied_ids = (array)DB::table('job_user')->select('job_id')->where('user_id', Auth::user()->id)->get();
        
         array_values($applied_ids);
        return in_array(5, $applied_ids);
        return view('user.jobs.index', compact('jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('user.jobs.show', compact('job'));
    }
}
