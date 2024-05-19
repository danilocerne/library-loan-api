<?php

namespace App\Repositories\Contracts;

interface BookAuthorRepositoryInterface
{
    public function getListBookAuthor();
    public function getBookAuthorById(int $id);
    public function createBookAuthor(array $bookAuthor);
    public function updateBookAuthor(int $id);
    public function deleteBookAuthor(int $id);
}
