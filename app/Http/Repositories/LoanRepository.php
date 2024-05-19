<?php

namespace App\Repositories;

use App\Repositories\Contracts\LoanRepositoryInterface;
use App\Model\Loan;

class LoanRepository implements LoanRepositoryInterface
{
    protected $entity;

    public function __construct(Loan $loan)
    {
        $this->entity = $loan;
    }

    /**
     * Get all loans
     * @return array
     */
    public function getListLoan()
    {
        return $this->entity->paginate();
    }

    /**
     * Get loan by id
     * @param int $id
     * @return object
     */
    public function getLoanById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new loan
     * @param array $loan
     * @return object
     */
    public function createLoan(array $loan)
    {
        return $this->entity->create($loan);
    }

    /**
     * Update loan
     * @param object $loan
     * @return object
     */
    public function updateLoan(object $loan)
    {
        return $this->entity->update($loan);
    }

    /**
     * Delete loan
     * @param int $id
     * @return object
     */
    public function deleteLoan(int $id)
    {
        $this->entity->delete($id);
    }
}
