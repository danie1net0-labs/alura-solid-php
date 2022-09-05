<?php

namespace App\Services;

use App\Models\Interfaces\Scoring;

class ScoreCalculator
{
    public function getScore(Scoring $scoring): int
    {
        return $scoring->getScore();
    }
}
