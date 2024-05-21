<?php

namespace App\Http\Repositories\Contracts;

interface AuthorRepositoryInterface
{
    public function getListAuthor();
    public function getAuthorById(int $id);
    public function createAuthor(array $author);
    public function updateAuthor(int $id);
    public function deleteAuthor(int $id);
}
