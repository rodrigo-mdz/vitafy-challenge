<?php

namespace App\Services;

use App\Events\LeadCreatedOrUpdated;
use App\Models\Client;
use App\Models\Lead;
use App\Repositories\LeadRepositoryInterface;

class LeadService
{
    private LeadRepositoryInterface $leadRepository;

    public function __construct(
        LeadRepositoryInterface $leadRepository,
    ) {
        $this->leadRepository = $leadRepository;
    }

    public function createLeadWithClientAndScore(array $leadData): Lead
    {
        $lead = $this->leadRepository->create($leadData);
        Client::create(['lead_id' => $lead->id]);
        event(new LeadCreatedOrUpdated($lead));
        return $lead;
    }

    public function findLeadOrFail(string $uuid): Lead
    {
        $lead = $this->leadRepository->findByUuid($uuid);
        if (!$lead) {
            abort(404, 'Lead not found');
        }
        return $lead;
    }

    public function updateLead(string $uuid, array $data): Lead
    {
        $lead = $this->findLeadOrFail($uuid);
        if (!array_key_exists('phone', $data)) {
            $data['phone'] = null;
        }
        $lead = $this->leadRepository->update($lead, $data);
        event(new LeadCreatedOrUpdated($lead));
        return $lead;
    }

    public function deleteLead(string $uuid): void
    {
        $lead = $this->findLeadOrFail($uuid);
        $this->leadRepository->delete($lead);
    }
}