<?php

namespace App\Services;

use App\Repositories\Contracts\LoanRepositoryInterface;
use Illuminate\Support\Str;

class LoanService
{
    protected $loanRepository;

    public function __construct(LoanRepositoryInterface $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    /**
     * Get all loans
     * @return array
     */
    public function getListLoans()
    {
        return $this->loanRepository->getListLoans();
    }

    /**
     * Get loan by id
     * @param int $id
     * @return object
     */
    public function getLoanById(int $id)
    {
        return $this->loanRepository->getLoanById($id);
    }

    /**
     * Create a new loan
     * @param array $loan
     * @return object
     */
    public function createLoan(array $loan)
    {
        return $this->loanRepository->createLoan($loan);
    }

    /**
     * Update loan
     * @param object $newLoan
     * @return object
     */
    public function updateLoan(object $newLoan)
    {
        $currentLoan = $this->loanRepository->getLoanById($newLoan->id);
        if (!$currentLoan) {
            return response()->json(['message' => 'Loan not found'], 404);
        }
        if ($currentLoan['name'])
            $currentLoan['name'] = $newLoan->name;
        return $this->loanRepository->updateLoan($currentLoan);
    }

    /**
     * Inactivate loan
     * @param int $id
     * @return object
     */
    public function inactivateLoan(int $id)
    {
        $loan = $this->loanRepository->getLoanById($id);
        if (!$loan) {
            return response()->json(['message' => 'Loan not found'], 404);
        }
        if ($loan['name'])
            $loan['active'] = 0;
        return $this->loanRepository->updateLoan($loan);
    }

    /**
     * Delete loan
     * @param int $id
     * @return object
     */
    public function deleteLoan(int $id)
    {
        $loan = $this->loanRepository->getLoanById($id);
        if (!$loan) {
            return response()->json(['message' => 'Loan not found'], 404);
        }
        return $this->loanRepository->deleteLoan($id);
    }
}
