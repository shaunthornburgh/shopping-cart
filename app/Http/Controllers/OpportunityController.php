<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreOpportunityRequest;
use App\Http\Resources\OpportunityResource;
use App\Models\Opportunity;

class OpportunityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOpportunityRequest $request
     */
    public function store(StoreOpportunityRequest $request): OpportunityResource
    {
        return new OpportunityResource(Opportunity::create($request->validated()));
    }
}
