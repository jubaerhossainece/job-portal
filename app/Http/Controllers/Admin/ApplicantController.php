<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    public function applicantList($id){
        $job = Job::findOrFail($id);
        return view('admin.applicants.list', compact('job'));
    }


    public function singleApplicant($job_id, $user_id){
        $user = DB::table('users')->where('id', $user_id)->first();
        return view('admin.applicants.single', compact('user'));
    }
}
