<?php

namespace App\Http\Controllers;

use App\Models\FailedJob;
use App\Models\Job;
use Illuminate\Http\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $failedJobs = FailedJob::orderByDesc('failed_at')->get();
        $jobs = Job::all();

        return view('admin.job.index', compact('failedJobs', 'jobs'));
    }
}
