<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthorService;
use App\Http\Requests\StoreUpdateAuthor;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{

    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $authors = $this->authorService->getListAuthors();
        return AuthorResource::collection($authors);
    }

    public function store(StoreUpdateAuthor $request)
    {
        $author = $this->authorService->createAuthor($request->all());
        return new AuthorResource($author);
    }

    public function show($id)
    {
        $author = $this->authorService->getAuthorById($id);
        return new AuthorResource($author);
    }

    public function update(StoreUpdateAuthor $request, $id)
    {
        $author = $this->authorService->updateAuthor($id, $request->all());
        return $author;
    }

    public function inactivate(StoreUpdateAuthor $request, $id)
    {
        $author = $this->authorService->inactivateAuthor($id, $request->all());
        return $author;
    }

    public function destroy($id)
    {
        $author = $this->authorService->deleteAuthor($id);
        return $author;
    }

}
