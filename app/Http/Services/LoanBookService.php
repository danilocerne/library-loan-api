<?php

namespace App\Services;

use App\Repositories\Contracts\LoanBookRepositoryInterface;
use Illuminate\Support\Str;

class LoanBookService
{
    protected $loanBookRepository;

    public function __construct(LoanBookRepositoryInterface $loanBookRepository)
    {
        $this->loanBookRepository = $loanBookRepository;
    }

    /**
     * Get all books
     * @return array
     */
    public function getListLoanBooks()
    {
        return $this->loanBookRepository->getListLoanBooks();
    }

    /**
     * Get loan book by id
     * @param int $id
     * @return object
     */
    public function getLoanBookById(int $id)
    {
        return $this->loanBookRepository->getLoanBookById($id);
    }

    /**
     * Create a new loan book
     * @param array $loanBook
     * @return object
     */
    public function createLoanBook(array $loanBook)
    {
        return $this->loanBookRepository->createLoanBook($loanBook);
    }

    /**
     * Update loan book
     * @param object $newLoanBook
     * @return object
     */
    public function updateLoanBook(object $newLoanBook)
    {
        $currentLoanBook = $this->loanBookRepository->getLoanBookById($newLoanBook->id);
        if (!$currentLoanBook) {
            return response()->json(['message' => 'Loan Book not found'], 404);
        }
        if ($currentLoanBook['name'])
            $currentLoanBook['name'] = $newLoanBook->name;
        return $this->loanBookRepository->updateLoanBook($currentLoanBook);
    }

    /**
     * Inactivate loan book
     * @param int $id
     * @return object
     */
    public function inactivateLoanBook(int $id)
    {
        $loanBook = $this->loanBookRepository->getLoanBookById($id);
        if (!$loanBook) {
            return response()->json(['message' => 'Loan Book not found'], 404);
        }
        if ($loanBook['name'])
            $loanBook['active'] = 0;
        return $this->loanBookRepository->updateLoanBook($loanBook);
    }

    /**
     * Delete loan book
     * @param int $id
     * @return object
     */
    public function deleteLoanBook(int $id)
    {
        $loanBook = $this->loanBookRepository->getLoanBookById($id);
        if (!$loanBook) {
            return response()->json(['message' => 'Loan Book not found'], 404);
        }
        return $this->loanBookRepository->deleteLoanBook($id);
    }
}
