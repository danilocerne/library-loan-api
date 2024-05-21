<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\AuthorRepositoryInterface;
use App\Model\Author;

class AuthorRepository implements AuthorRepositoryInterface
{
    protected $entity;

    public function __construct(Author $author)
    {
        $this->entity = $author;
    }

    /**
     * Get all authors
     * @return array
     */
    public function getListAuthor()
    {
        return $this->entity->paginate();
    }

    /**
     * Get author by id
     * @param int $id
     * @return object
     */
    public function getAuthorById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new author
     * @param array $author
     * @return object
     */
    public function createAuthor(array $author)
    {
        return $this->entity->create($author);
    }

    /**
     * Update author
     * @param object $author
     * @return object
     */
    public function updateAuthor(object $author)
    {
        return $this->entity->update($author);
    }

    /**
     * Delete author
     * @param int $id
     * @return object
     */
    public function deleteAuthor($id)
    {
        return $this->entity->delete($id);
    }
}
