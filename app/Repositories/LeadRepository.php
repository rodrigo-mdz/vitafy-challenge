<?php

namespace App\Repositories;

use App\Models\Lead;

class LeadRepository implements LeadRepositoryInterface
{
    public function create(array $data): Lead
    {
        return Lead::create($data);
    }

    public function update(Lead $lead, array $data): Lead
    {
        $lead->update($data);
        return $lead;
    }

    public function delete(Lead $lead): void
    {
        $lead->delete();
    }

    public function findByUuid(string $uuid): ?Lead
    {
        return Lead::where('uuid', $uuid)->first();
    }
}