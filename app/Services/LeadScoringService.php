<?php

namespace App\Services;

use App\Contracts\LeadScoringServiceInterface;

class LeadScoringService implements LeadScoringServiceInterface
{
    public function getLeadScore(array $data): int
    {
        return 0;
    }
}