<?php

namespace App\Http\Repositories\Contracts;

interface LoanRepositoryInterface
{
    public function getListLoan();
    public function getLoanById(int $id);
    public function createLoan(array $loan);
    public function updateLoan(int $id);
    public function deleteLoan(int $id);
}
