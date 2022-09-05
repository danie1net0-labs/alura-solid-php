<?php

namespace App\Services;

use App\Models\Interfaces\Scoring;

class Watcher
{
    public function watch(Scoring $scoring): void
    {
        $scoring->watch();
    }
}
