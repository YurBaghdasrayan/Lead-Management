<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Lead;
use App\Services\LeadService;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LeadController extends Controller
{
    protected LeadService $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    /**
     * Show the form for creating a new lead.
     *
     * @return View
     */
    public function create(): View
    {
        return view('leads.create');
    }

    /**
     * Store a newly created lead in storage.
     *
     * @param StoreLeadRequest $request
     * @return RedirectResponse
     */
    public function store(StoreLeadRequest $request): RedirectResponse
    {
        $this->leadService->create($request->validated());
        return redirect()->back()->with('success', 'Лид успешно создан.');
    }

    /**
     * Display a listing of leads.
     *
     * @return View
     */
    public function index(): View
    {
        $leads = Lead::with('status')->get();
        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for editing the specified lead.
     *
     * @param Lead $lead
     * @return View
     */
    public function edit(Lead $lead): View
    {
        $statuses = Status::all();
        return view('leads.edit', compact('lead', 'statuses'));
    }

    /**
     * Update the specified lead in storage.
     *
     * @param UpdateLeadRequest $request
     * @param Lead $lead
     * @return RedirectResponse
     */
    public function update(UpdateLeadRequest $request, Lead $lead): RedirectResponse
    {
        $this->leadService->update($lead, $request->validated());
        return redirect()->route('leads.index')->with('success', 'Лид успешно обновлён.');
    }

    /**
     * Remove the specified lead from storage.
     *
     * @param Lead $lead
     * @return RedirectResponse
     */
    public function destroy(Lead $lead): RedirectResponse
    {
        $this->leadService->delete($lead);
        return redirect()->route('leads.index')->with('success', 'Лид успешно удалён.');
    }
}
