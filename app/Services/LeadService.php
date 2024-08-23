<?php

namespace App\Services;

use App\Models\Lead;

class LeadService
{
    /**
     * Create a new lead.
     *
     * @param array $data
     * @return Lead
     */
    public function create(array $data): Lead
    {
        return Lead::create(array_merge($data, ['status_id' => 1]));
    }

    /**
     * Update the specified lead.
     *
     * @param Lead $lead
     * @param array $data
     * @return bool
     */
    public function update(Lead $lead, array $data): bool
    {
        return $lead->update($data);
    }

    /**
     * Delete the specified lead.
     *
     * @param Lead $lead
     * @return bool
     */
    public function delete(Lead $lead): bool
    {
        return $lead->delete();
    }
}
