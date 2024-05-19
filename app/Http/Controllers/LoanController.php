<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoanService;
use App\Http\Requests\StoreUpdateLoan;
use App\Http\Resources\LoanResource;

class LoanController extends Controller
{

    protected $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function index()
    {
        $loans = $this->loanService->getListLoans();
        return LoanResource::collection($loans);
    }

    public function store(StoreUpdateLoan $request)
    {
        $loan = $this->loanService->createLoan($request->all());
        return new LoanResource($loan);
    }

    public function show($id)
    {
        $loan = $this->loanService->getLoanById($id);
        return new LoanResource($loan);
    }

    public function update(StoreUpdateLoan $request, $id)
    {
        $loan = $this->loanService->updateLoan($id, $request->all());
        return $loan;
    }

    public function inactivate(StoreUpdateLoan $request, $id)
    {
        $loan = $this->loanService->inactivateLoan($id, $request->all());
        return $loan;
    }

    public function destroy($id)
    {
        $loan = $this->loanService->deleteLoan($id);
        return $loan;
    }

}
