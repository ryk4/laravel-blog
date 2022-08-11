<?php

namespace App\Http\Controllers;

use App\Interfaces\JobInterface;
use App\Models\FailedJob;
use App\Models\Job;
use App\Repositories\JobRepository;
use Illuminate\Http\Response;

class JobController extends Controller
{
    private JobRepository $repository;

    public function __construct()
    {
        $this->repository = new JobRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $failedJobs = $this->repository->allFailedJobs();
        $jobs = $this->repository->allPendingJob();

        return view('admin.job.index', compact('failedJobs', 'jobs'));
    }
}
