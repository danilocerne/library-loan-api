<?php

namespace App\Services;

use App\Repositories\Contracts\AuthorRepositoryInterface;
use Illuminate\Support\Str;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Get all authors
     * @return array
     */
    public function getListAuthors()
    {
        return $this->authorRepository->getListAuthors();
    }

    /**
     * Get author by id
     * @param int $id
     * @return object
     */
    public function getAuthorById(int $id)
    {
        return $this->authorRepository->getAuthorById($id);
    }

    /**
     * Create a new author
     * @param array $author
     * @return object
     */
    public function createAuthor(array $author)
    {
        return $this->authorRepository->createAuthor($author);
    }

    /**
     * Update author
     * @param object $author
     * @return object
     */
    public function updateAuthor(object $newAuthor)
    {
        $currentAuthor = $this->authorRepository->getAuthorById($newAuthor->id);
        if (!$currentAuthor) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        if ($currentAuthor['name'])
            $currentAuthor['name'] = $newAuthor->name;
        return $this->authorRepository->updateAuthor($currentAuthor);
    }

    /**
     * Inactivate author
     * @param int $id
     * @return object
     */
    public function inactivateAuthor(int $id)
    {
        $author = $this->authorRepository->getAuthorById($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        if ($author['name'])
            $author['active'] = 0;
        return $this->authorRepository->updateAuthor($author);
    }

    /**
     * Inactivate author
     * @param int $id
     * @return object
     */
    public function deleteAuthor(int $id)
    {
        $author = $this->authorRepository->getAuthorById($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return $this->authorRepository->deleteAuthor($id);
    }
}
