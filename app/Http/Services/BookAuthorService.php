<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\BookAuthorRepositoryInterface;

class BookAuthorService
{
    protected $authorBookRepository;

    public function __construct(BookAuthorRepositoryInterface $authorBookRepository)
    {
        $this->authorBookRepository = $authorBookRepository;
    }

    /**
     * Get all book authors
     * @return array
     */
    public function getListBookAuthors()
    {
        return $this->authorBookRepository->getListBookAuthors();
    }

    /**
     * Get book author by id
     * @param int $id
     * @return object
     */
    public function getBookAuthorById(int $id)
    {
        return $this->authorBookRepository->getBookAuthorById($id);
    }

    /**
     * Create a new book author
     * @param array $author
     * @return object
     */
    public function createBookAuthor(array $author)
    {
        return $this->authorBookRepository->createBookAuthor($author);
    }

    /**
     * Update book author
     * @param object $author
     * @return object
     */
    public function updateBookAuthor(object $newBookAuthor)
    {
        $currentBookAuthor = $this->authorBookRepository->getBookAuthorById($newBookAuthor->id);
        if (!$currentBookAuthor) {
            return response()->json(['message' => 'Book Author not found'], 404);
        }
        if ($currentBookAuthor['name'])
            $currentBookAuthor['name'] = $newBookAuthor->name;
        return $this->authorBookRepository->updateBookAuthor($currentBookAuthor);
    }

    /**
     * Inactivate book author
     * @param int $id
     * @return object
     */
    public function inactivateBookAuthor(int $id)
    {
        $authorBook = $this->authorBookRepository->getBookAuthorById($id);
        if (!$authorBook) {
            return response()->json(['message' => 'BookAuthor not found'], 404);
        }
        if ($authorBook['name'])
            $authorBook['active'] = 0;
        return $this->authorBookRepository->updateBookAuthor($authorBook);
    }

    /**
     * Inactivate book author
     * @param int $id
     * @return object
     */
    public function deleteBookAuthor(int $id)
    {
        $authorBook = $this->authorBookRepository->getBookAuthorById($id);
        if (!$authorBook) {
            return response()->json(['message' => 'Author Book not found'], 404);
        }
        return $this->authorBookRepository->deleteBookAuthor($id);
    }
}
