<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Http\Resources\LeadResource;
use App\Services\LeadService;
use Illuminate\Http\JsonResponse;

class LeadController extends Controller
{
    private LeadService $leadService;
    /**
     * Controller constructor.
     *
     * @param LeadService $leadService
     */
    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    /**
     * Store a new lead with client.
     *
     * @param StoreLeadRequest $request
     * @return JsonResponse
     */
    public function store(StoreLeadRequest $request)
    {
        $lead = $this->leadService->createLeadWithClientAndScore($request->validated());
        return response()->json(new LeadResource($lead), JsonResponse::HTTP_CREATED);
    }

    /**
     * Display a specific lead.
     *
     * @param string $uuid
     * @return JsonResponse
     */
    public function show(string $uuid)
    {
        $lead = $this->leadService->findLeadOrFail($uuid);
        return response()->json(new LeadResource($lead), JsonResponse::HTTP_OK);
    }

    /**
     * Update an existing lead.
     *
     * @param UpdateLeadRequest $request
     * @param string $uuid
     * @return JsonResponse
     */
    public function update(UpdateLeadRequest $request, string $uuid)
    {
        $lead = $this->leadService->updateLead($uuid, $request->validated());
        return response()->json(new LeadResource($lead), JsonResponse::HTTP_OK);
    }

    /**
     * Delete a specific lead.
     *
     * @param string $uuid
     * @return JsonResponse
     */
    public function destroy(string $uuid)
    {
        $this->leadService->deleteLead($uuid);
        return response()->json(null, JsonResponse::HTTP_OK);
    }
}
