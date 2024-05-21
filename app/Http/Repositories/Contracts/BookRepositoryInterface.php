<?php

namespace App\Http\Repositories\Contracts;

interface BookRepositoryInterface
{
    public function getListBook();
    public function getBookById(int $id);
    public function createBook(array $book);
    public function updateBook(int $id);
    public function deleteBook(int $id);
}
