<?php

namespace App\Repositories;

use App\Interfaces\JobInterface;
use App\Models\FailedJob;
use App\Models\Job;
use Illuminate\Support\Collection;

class JobRepository implements JobInterface
{
    public function allPendingJob(int $paginate = 100): Collection
    {
        return Job::get();
    }

    public function allFailedJobs(int $paginate = 100): Collection
    {
        return FailedJob::orderByDesc('failed_at')->get();
    }
}
