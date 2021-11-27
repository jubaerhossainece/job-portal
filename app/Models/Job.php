<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobType;
use App\Models\User;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function jobType(){
        return $this->belongsTo(JobType::class, 'job_types_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
