<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Repositories\Contracts\{
    AuthorRepositoryInterface,
    BookAuthorRepositoryInterface,
    BookRepositoryInterface,
    GroupRepositoryInterface,
    LoanBookRepositoryInterface,
    LoanRepositoryInterface,
    PermissionRepositoryInterface,
    UserRepositoryInterface,
    UserTypeRepositoryInterface
};

use App\Http\Repositories\{
    AuthorRepository,
    BookAuthorRepository,
    BookRepository,
    GroupRepository,
    LoanBookRepository,
    LoanRepository,
    PermissionRepository,
    UserRepository,
    UserTypeRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthorRepositoryInterface::class,
            AuthorRepository::class
        );

        $this->app->bind(
            BookAuthorRepositoryInterface::class,
            BookAuthorRepository::class
        );

        $this->app->bind(
            BookRepositoryInterface::class,
            BookrRepository::class
        );

        $this->app->bind(
            GroupRepositoryInterface::class,
            GroupRepository::class
        );

        $this->app->bind(
            LoanBookRepositoryInterface::class,
            LoanBookRepository::class
        );

        $this->app->bind(
            LoanRepositoryInterface::class,
            LoanRepository::class
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            UserTypeRepositoryInterface::class,
            UserTypeRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
