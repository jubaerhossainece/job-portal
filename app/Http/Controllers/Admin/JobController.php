<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jobs = Job::select('id','title', 'is_active', 'job_types_id')
        //             ->get();
        $jobs = Job::select('id','title', 'is_active', 'job_types_id')
                ->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_types = DB::table('job_types')->get();
        return view('admin.jobs.create', compact('job_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_types_id' => 'required',
            'thumbnail' => 'required|image'
        ]);

        if($request->hasFile('thumbnail')){
            $path = 'public/admin/images/jobs';
            $file= $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename_with_ext = time().'.'.$extension;
            $request->file('thumbnail')->storeAs($path, $filename_with_ext);
        }

        $result = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'job_types_id' => $request->job_types_id,
            'thumbnail' => isset($filename_with_ext) ? $filename_with_ext : '',
            'is_active' => $request->is_active ? true : false ,
        ]);

        if($result){
            return redirect()->back()->with('success', 'New job added');
        }else{
            return redirect()->back()->with('warning', 'Something went wrong');
        }
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
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_types = DB::table('job_types')->get();
        $job = Job::findOrFail($id);

        return view('admin.jobs.edit', compact('job_types', 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_types_id' => 'required',
            'thumbnail' => 'image'
        ]);

        $job = DB::table('jobs')->where('id', $id)->first();

        if($request->hasFile('thumbnail')){
            $path = 'public/admin/images/jobs';
            $file= $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename_with_ext = time().'.'.$extension;
            $request->file('thumbnail')->storeAs($path, $filename_with_ext);
            Storage::delete('public/admin/images/jobs/'.$job->thumbnail);
        }

        $result = DB::table('jobs')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'job_types_id' => $request->job_types_id,
            'thumbnail' => isset($filename_with_ext) ? $filename_with_ext : $job->thumbnail,
            'is_active' => $request->is_active ? true : false,
        ]);

        if($result){
            return redirect()->back()->with('success', 'Job information updated');
        }else{
            return redirect()->back()->with('warning', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::table('jobs')->where('id',$id)->delete();
        if($result){
            return redirect()->back()->with('success', 'Job deleted from database!');
        }else{
            return redirect()->back()->with('warning', 'Something went wrong');
        }
    }
}
