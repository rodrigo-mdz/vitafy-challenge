<?php

namespace App\Listeners;

use App\Events\LeadCreatedOrUpdated;
use App\Contracts\LeadScoringServiceInterface;

class UpdateLeadScore
{
    protected LeadScoringServiceInterface $scoringService;

    public function __construct(LeadScoringServiceInterface $scoringService)
    {
        $this->scoringService = $scoringService;
    }

    public function handle(LeadCreatedOrUpdated $event)
    {
        $score = $this->scoringService->getLeadScore($event->lead->toArray());
        $event->lead->update(['score' => $score]);
    }
}
