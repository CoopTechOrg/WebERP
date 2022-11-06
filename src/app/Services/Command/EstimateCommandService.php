<?php

namespace App\Services\Command;

use App\Http\Requests\Estimate\CreateRequest;
use App\Models\Estimate;
use App\Repositories\EstimateRepository;
use Illuminate\Support\Facades\Auth;

class EstimateCommandService
{
    private EstimateRepository $estimateRepository;

    public function __construct(EstimateRepository $estimateRepository)
    {
        $this->estimateRepository = $estimateRepository;
    }

    public function create(CreateRequest $createRequest): Estimate
    {
        $estimates = new Estimate();
        $estimates->no = $createRequest->getEstimateNumber();
        $estimates->subject = $createRequest->getSubject();
        $estimates->buyer_id = $createRequest->getClients();
        $estimates->contacted_by = $createRequest->getStaff();
        $estimates->submitted_at = $createRequest->getPublishdate();
        $estimates->is_lost = false;
        $estimates->expired_at = $createRequest->getEffectivedate();
        $estimates->remarks = $createRequest->getRemarks();
        $estimates->created_by = Auth::id();
        $estimates->updated_by = Auth::id();

        return $this->estimateRepository->save($estimates);
    }

}
