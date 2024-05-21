<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\BookRepositoryInterface;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Get all books
     * @return array
     */
    public function getListBooks()
    {
        return $this->bookRepository->getListBooks();
    }

    /**
     * Get book by id
     * @param int $id
     * @return object
     */
    public function getBookById(int $id)
    {
        return $this->bookRepository->getBookById($id);
    }

    /**
     * Create a new book
     * @param array $book
     * @return object
     */
    public function createBook(array $book)
    {
        return $this->bookRepository->createBook($book);
    }

    /**
     * Update book
     * @param object $newBook
     * @return object
     */
    public function updateBook(object $newBook)
    {
        $currentBook = $this->bookRepository->getBookById($newBook->id);
        if (!$currentBook) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        if ($currentBook['name'])
            $currentBook['name'] = $newBook->name;
        return $this->bookRepository->updateBook($currentBook);
    }

    /**
     * Inactivate book
     * @param int $id
     * @return object
     */
    public function inactivateBook(int $id)
    {
        $book = $this->bookRepository->getBookById($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        if ($book['name'])
            $book['active'] = 0;
        return $this->bookRepository->updateBook($book);
    }

    /**
     * Delete book
     * @param int $id
     * @return object
     */
    public function deleteBook(int $id)
    {
        $book = $this->bookRepository->getBookById($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return $this->bookRepository->deleteBook($id);
    }
}
