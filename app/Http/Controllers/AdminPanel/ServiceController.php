<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\BranchService;
use App\Http\Controllers\Services\CustomerService;
use App\Http\Controllers\Services\OfferService;
use App\Http\Controllers\Services\RealEstatesService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $offerService;
    protected $realEstatesService;
    protected $branchService;
    protected $customerService;

    public function __construct(OfferService $offerService, RealEstatesService $realEstatesService, BranchService $branchService, CustomerService $customerService)
    {
        $this->offerService = $offerService;
        $this->realEstatesService = $realEstatesService;
        $this->branchService = $branchService;
        $this->customerService = $customerService;
    }

    public function storeOffer()
    {
        return $this->offerService->store();
    }

    public function storeCity()
    {
        return $this->realEstatesService->storeCity();
    }

    public function storeNeighborhood()
    {
        return $this->realEstatesService->storeNeighborhood();
    }

    public function storePropertyType()
    {
        return $this->realEstatesService->storePropertyType();
    }

    public function storePropertyStatus()
    {
        return $this->realEstatesService->storePropertyStatus();
    }

    public function storeOfferTypes()
    {
        return $this->realEstatesService->storeOfferTypes();
    }

    public function storePriceTypes()
    {
        return $this->realEstatesService->storePriceTypes();
    }

    public function storeDirection()
    {
        return $this->realEstatesService->storeDirection();
    }

    public function storeStreet()
    {
        return $this->realEstatesService->storeStreet();
    }

    public function storeLandType()
    {
        return $this->realEstatesService->storeLandType();
    }

    public function storeLicensed()
    {
        return $this->realEstatesService->storeLicensed();
    }

    public function storeLand()
    {
        return $this->realEstatesService->storeLand();
    }

    public function storeBranch()
    {
        return $this->branchService->store();
    }

    public function editBranch($id)
    {
        return $this->branchService->edit($id);
    }

    public function changeCustomerStatus($customer)
    {
        return $this->customerService->changeCustomerStatus($customer);
    }

    public function changeBranchStatus($branch)
    {
        return $this->branchService->changeBranchStatus($branch);
    }

}
