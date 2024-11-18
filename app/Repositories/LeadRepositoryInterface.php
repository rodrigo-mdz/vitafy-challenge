<?php

namespace App\Repositories;

use App\Models\Lead;

interface LeadRepositoryInterface
{
    public function findByUuid(string $uuid): ?Lead;
    public function delete(Lead $lead): void;
    public function create(array $data): Lead;
    public function update(Lead $lead, array $data): Lead;
}