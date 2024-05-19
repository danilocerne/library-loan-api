<?php

namespace App\Providers;

use App\Repositories\Contracts\{
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

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthorRepositoryInterface::Class,
            AuthorRepository::Class
        );

        $this->app->bind(
            BookAuthorRepositoryInterface::Class,
            BookAuthorRepository::Class
        );

        $this->app->bind(
            BookRepositoryInterface::Class,
            BookrRepository::Class
        );

        $this->app->bind(
            GroupRepositoryInterface::Class,
            GroupRepository::Class
        );

        $this->app->bind(
            LoanBookRepositoryInterface::Class,
            LoanBookRepository::Class
        );

        $this->app->bind(
            LoanRepositoryInterface::Class,
            LoanRepository::Class
        );

        $this->app->bind(
            PermissionRepositoryInterface::Class,
            PermissionRepository::Class
        );

        $this->app->bind(
            UserRepositoryInterface::Class,
            UserRepository::Class
        );

        $this->app->bind(
            UserTypeRepositoryInterface::Class,
            UserTypeRepository::Class
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
