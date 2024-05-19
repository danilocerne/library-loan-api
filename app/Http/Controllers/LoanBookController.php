<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoanBookService;
use App\Http\Requests\StoreUpdateLoanBook;
use App\Http\Resources\LoanBookResource;

class LoanBookController extends Controller
{

    protected $loanBookService;

    public function __construct(LoanBookService $loanBookService)
    {
        $this->loanBookService = $loanBookService;
    }

    public function index()
    {
        $loanBooks = $this->loanBookService->getListLoanBooks();
        return LoanBookResource::collection($loanBooks);
    }

    public function store(StoreUpdateLoanBook $request)
    {
        $loanBook = $this->loanBookService->createLoanBook($request->all());
        return new LoanBookResource($loanBook);
    }

    public function show($id)
    {
        $loanBook = $this->loanBookService->getLoanBookById($id);
        return new LoanBookResource($loanBook);
    }

    public function update(StoreUpdateLoanBook $request, $id)
    {
        $loanBook = $this->loanBookService->updateLoanBook($id, $request->all());
        return $loanBook;
    }

    public function inactivate(StoreUpdateLoanBook $request, $id)
    {
        $loanBook = $this->loanBookService->inactivateLoanBook($id, $request->all());
        return $loanBook;
    }

    public function destroy($id)
    {
        $loanBook = $this->loanBookService->deleteLoanBook($id);
        return $loanBook;
    }

}
