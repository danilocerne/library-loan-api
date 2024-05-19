<?php

namespace App\Repositories;

use App\Repositories\Contracts\BookRepositoryInterface;
use App\Model\Book;

class BookRepository implements BookRepositoryInterface
{
    protected $entity;

    public function __construct(Book $book)
    {
        $this->entity = $book;
    }

    /**
     * Get all books
     * @return array
     */
    public function getListBook()
    {
        return $this->entity->paginate();
    }

    /**
     * Get book by id
     * @param int $id
     * @return object
     */
    public function getBookById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new book
     * @param array $book
     * @return object
     */
    public function createBook(array $book)
    {
        return $this->entity->create($book);
    }

    /**
     * Update book
     * @param object $book
     * @return object
     */
    public function updateBook(object $book)
    {
        return $this->entity->update($book);
    }

    /**
     * Delete book
     * @param int $id
     * @return object
     */
    public function deleteBook(int $id)
    {
        $this->entity->delete($id);
    }
}
