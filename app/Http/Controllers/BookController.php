<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\BookService;
use App\Http\Requests\StoreUpdateBook;
use App\Http\Resources\BookResource;

class BookController extends Controller
{

    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getListBooks();
        return BookResource::collection($books);
    }

    public function store(StoreUpdateBook $request)
    {
        $book = $this->bookService->createBook($request->all());
        return new BookResource($book);
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        return new BookResource($book);
    }

    public function update(StoreUpdateBook $request, $id)
    {
        $book = $this->bookService->updateBook($id, $request->all());
        return $book;
    }

    public function inactivate(StoreUpdateBook $request, $id)
    {
        $book = $this->bookService->inactivateBook($id, $request->all());
        return $book;
    }

    public function destroy($id)
    {
        $book = $this->bookService->deleteBook($id);
        return $book;
    }

}
