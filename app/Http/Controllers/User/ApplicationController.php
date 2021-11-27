<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function apply(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $user->jobs()->attach($request->job_id);
        
        return response()->json([
            'message' => 'success'
        ]);
    }
}
