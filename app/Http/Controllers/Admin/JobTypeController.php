<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\JobType;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_types = DB::table('job_types')->get();
        return view('admin.job-types.index', compact('job_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job-types.create');
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
            'title' => 'required|unique:job_types,title'
        ]);

        $result = DB::table('job_types')->insert([
            'title' => $request->title
        ]);

        if($result){
            return redirect()->back()->with('success', 'New job type added');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_type = DB::table('job_types')->find($id);
        return view('admin.job-types.edit', compact('job_type'));
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
           'title' => ['required',Rule::unique('job_types', 'title')->ignore($id)]
        ]);

        $result = DB::table('job_types')->where('id', $id)->update([
            'title' => $request->title
        ]);

        if($result){
            return redirect()->back()->with('success', 'Job type updated!');
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
        $result = DB::table('job_types')->where('id',$id)->delete();
        if($result){
            return redirect()->back()->with('success', 'Job type deleted!');
        }else{
            return redirect()->back()->with('warning', 'Something went wrong');
        }
    }
}
