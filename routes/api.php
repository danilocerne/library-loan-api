<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('register', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'login']);

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::get("user/list", [UserController::class, "index"]);
    Route::get("user/show/{id}", [UserController::class, "show"]);
    Route::put("user/update/{id}", [UserController::class, "update"]);
    Route::patch("user/inactivate/{id}", [UserController::class, "inactivate"]);
    Route::delete("user/delete/{id}", [UserController::class, "destroy"]);
    Route::post("/logout", [UserController::class, "logout"]);

    Route::get("user-type/list", [UserTypeController::class, "index"]);
    Route::get("user-type/show/{id}", [UserTypeController::class, "show"]);
    Route::post('user-type/create', [UserTypeController::class, 'store']);
    Route::put("user-type/update/{id}", [UserTypeController::class, "update"]);
    Route::patch("user-type/inactivate/{id}", [UserTypeController::class, "inactivate"]);
    Route::delete("user-type/delete/{id}", [UserTypeController::class, "destroy"]);

    Route::get("group/list", [GroupController::class, "index"]);
    Route::get("group/show/{id}", [GroupController::class, "show"]);
    Route::post('group/create', [GroupController::class, 'store']);
    Route::put("group/update/{id}", [GroupController::class, "update"]);
    Route::patch("group/inactivate/{id}", [GroupController::class, "inactivate"]);
    Route::delete("group/delete/{id}", [GroupController::class, "destroy"]);

    Route::get("permission/list", [PermissionController::class, "index"]);
    Route::get("permission/show/{id}", [PermissionController::class, "show"]);
    Route::post('permission/create', [PermissionController::class, 'store']);
    Route::put("permission/update/{id}", [PermissionController::class, "update"]);
    Route::patch("permission/inactivate/{id}", [PermissionController::class, "inactivate"]);
    Route::delete("permission/delete/{id}", [PermissionController::class, "destroy"]);

    Route::get("author/list", [AuthorController::class, "index"]);
    Route::get("author/show/{id}", [AuthorController::class, "show"]);
    Route::post('author/create', [AuthorController::class, 'store']);
    Route::put("author/update/{id}", [AuthorController::class, "update"]);
    Route::patch("author/inactivate/{id}", [AuthorController::class, "inactivate"]);
    Route::delete("author/delete/{id}", [AuthorController::class, "destroy"]);

    Route::get("book-author/list", [BookAuthorController::class, "index"]);
    Route::get("book-author/show/{id}", [BookAuthorController::class, "show"]);
    Route::post('book-author/create', [BookAuthorController::class, 'store']);
    Route::put("book-author/update/{id}", [BookAuthorController::class, "update"]);
    Route::patch("book-author/inactivate/{id}", [BookAuthorController::class, "inactivate"]);
    Route::delete("book-author/delete/{id}", [BookAuthorController::class, "destroy"]);

    Route::get("loan/list", [LoanController::class, "index"]);
    Route::get("loan/show/{id}", [LoanController::class, "show"]);
    Route::post('loan/create', [LoanController::class, 'store']);
    Route::put("loan/update/{id}", [LoanController::class, "update"]);
    Route::patch("loan/inactivate/{id}", [LoanController::class, "inactivate"]);
    Route::delete("loan/delete/{id}", [LoanController::class, "destroy"]);

    Route::get("loan-book/list", [LoanBookController::class, "index"]);
    Route::get("loan-book/show/{id}", [LoanBookController::class, "show"]);
    Route::post('loan-book/create', [LoanBookController::class, 'store']);
    Route::put("loan-book/update/{id}", [LoanBookController::class, "update"]);
    Route::patch("loan-book/inactivate/{id}", [LoanBookController::class, "inactivate"]);
    Route::delete("loan-book/delete/{id}", [LoanBookController::class, "destroy"]);

});
