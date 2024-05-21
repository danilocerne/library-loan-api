<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\LoanBookRepositoryInterface;
use App\Model\LoanBook;

class LoanBookRepository implements LoanBookRepositoryInterface
{
    protected $entity;

    public function __construct(LoanBook $loanBook)
    {
        $this->entity = $loanBook;
    }

    /**
     * Get all loan books
     * @return array
     */
    public function getListLoanBook()
    {
        return $this->entity->paginate();
    }

    /**
     * Get loan book by id
     * @param int $id
     * @return object
     */
    public function getLoanBookById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new loan book
     * @param array $loanBook
     * @return object
     */
    public function createLoanBook(array $loanBook)
    {
        return $this->entity->create($loanBook);
    }

    /**
     * Update loan book
     * @param object $loanBook
     * @return object
     */
    public function updateLoanBook(object $loanBook)
    {
        return $this->entity->update($loanBook);
    }

    /**
     * Delete loan group
     * @param int $id
     * @return object
     */
    public function deleteLoanBook(int $id)
    {
        $this->entity->delete($id);
    }
}
