<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface JobInterface
{
    public function allPendingJob(int $paginate): Collection;

    public function allFailedJobs(int $paginate): Collection;
}
