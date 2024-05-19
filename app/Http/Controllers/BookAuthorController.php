<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookAuthorService;
use App\Http\Requests\StoreUpdateBookAuthor;
use App\Http\Resources\BookAuthorResource;

class BookAuthorController extends Controller
{

    protected $bookAuthorService;

    public function __construct(BookAuthorService $bookAuthorService)
    {
        $this->bookAuthorService = $bookAuthorService;
    }

    public function index()
    {
        $bookAuthors = $this->bookAuthorService->getListBookAuthors();
        return BookAuthorResource::collection($bookAuthors);
    }

    public function store(StoreUpdateBookAuthor $request)
    {
        $bookAuthor = $this->bookAuthorService->createBookAuthor($request->all());
        return new BookAuthorResource($bookAuthor);
    }

    public function show($id)
    {
        $bookAuthor = $this->bookAuthorService->getBookAuthorById($id);
        return new BookAuthorResource($bookAuthor);
    }

    public function update(StoreUpdateBookAuthor $request, $id)
    {
        $bookAuthor = $this->bookAuthorService->updateBookAuthor($id, $request->all());
        return $bookAuthor;
    }

    public function inactivate(StoreUpdateBookAuthor $request, $id)
    {
        $bookAuthor = $this->bookAuthorService->inactivateBookAuthor($id, $request->all());
        return $bookAuthor;
    }

    public function destroy($id)
    {
        $bookAuthor = $this->bookAuthorService->deleteBookAuthor($id);
        return $bookAuthor;
    }

}
