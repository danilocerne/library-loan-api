<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\BookAuthorRepositoryInterface;
use App\Model\BookAuthor;

class BookAuthorRepository implements BookAuthorRepositoryInterface
{
    protected $entity;

    public function __construct(BookAuthor $bookAuthor)
    {
        $this->entity = $bookAuthor;
    }

    /**
     * Get all book authors
     * @return array
     */
    public function getListBookAuthor()
    {
        return $this->entity->paginate();
    }

    /**
     * Get book author by id
     * @param int $id
     * @return object
     */
    public function getBookAuthorById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new book author
     * @param array $bookAuthor
     * @return object
     */
    public function createBookAuthor(array $bookAuthor)
    {
        return $this->entity->create($bookAuthor);
    }

    /**
     * Update book author
     * @param object $bookAuthor
     * @return object
     */
    public function updateBookAuthor(object $bookAuthor)
    {
        return $this->entity->update($bookAuthor);
    }

    /**
     * Delete book author
     * @param int $id
     * @return object
     */
    public function deleteBookAuthor(int $id)
    {
        $this->entity->delete($id);
    }
}
