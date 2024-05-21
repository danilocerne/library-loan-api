<?php

namespace App\Http\Repositories\Contracts;

interface LoanBookRepositoryInterface
{
    public function getListLoanBook();
    public function createLoanBook(array $loanGroup);
    public function updateLoanBook(int $id);
    public function deleteLoanBook(int $id);
}
