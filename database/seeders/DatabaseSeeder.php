<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Group;
use App\Models\UserType;
use App\Models\User;
use App\Models\Permission;
use App\Models\Book;
use App\Models\Author;
use App\Models\BookAuthor;
use App\Models\Loan;
use App\Models\LoanBook;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User permission groups
        Group::factory()->create([
            'name' => 'Administrator', //Administrator -> Id = 1
            'active' => 1
        ]);

        //User Types
        UserType::factory()->create([
            'name' => 'User manager the system', //User manager the system -> Id = 1
            'active' => 1
        ]);

        //Users
        User::factory()->create([
            'name' => 'Test User 1',
            'email' => 'test1@example.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'group_id' => 1, //Administrator -> Id = 1
            'user_type_id' => 1, //User manager the system -> Id = 1
        ]);

        //Group Permissions
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create user permissions group.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update user permissions group.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate user permissions group.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List user permission group.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        //User Types Permissions
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create user type.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update user type',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate user type',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List user type',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        //User Permissions
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create user.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update user.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate user',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List user',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        //Permissions
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create user group permission.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update user group permission.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate user group permission.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List user group permissions.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        //Author Permissions
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create book author.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update book author.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate book author.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List book authors.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        //Book Permissions
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create book.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update book.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate book.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List books.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        //Loan Permissions
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create loan.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update loan.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate loan.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List loans.',
            'have_permission' => 1,
            'group_id' => 1,
            'active' => 1
        ]);

        //User permission groups
        Group::factory()->create([
            'name' => 'Common user', //Common user -> Id = 2
            'active' => 1
        ]);

        //User Types
        UserType::factory()->create([
            'name' => 'Client', //Client -> Id = 2
            'active' => 1
        ]);

        //User
        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'group_id' => 2, //Common user -> Id = 2
            'user_type_id' => 2, //Client -> Id = 2
        ]);

        //Loan Permissions - Permission Group equal to User
        Permission::factory()->create([
            'name' => 'Create',
            'description' => 'Create loan.',
            'have_permission' => 1,
            'group_id' => 2,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Update',
            'description' => 'Update loan.',
            'have_permission' => 1,
            'group_id' => 2,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'Inactivate',
            'description' => 'Inactivate loan.',
            'have_permission' => 1,
            'group_id' => 2,
            'active' => 1
        ]);

        Permission::factory()->create([
            'name' => 'List',
            'description' => 'List loans.',
            'have_permission' => 1,
            'group_id' => 2,
            'active' => 1
        ]);

        //Books
        Book::factory()->create([
            'name' => 'Pandas Python',
            'active' => 1
        ]);

        Book::factory()->create([
            'name' => 'Bootstrap 4',
            'active' => 1
        ]);

        Book::factory()->create([
            'name' => 'Coletânea Front-end',
            'active' => 1
        ]);

        //Authors
        Author::factory()->create([
            'name' => 'Eduardo Corrêa',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Natan Souza',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Almir Filho',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Bernard De Luna',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Caio Gondin',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Deivid Marques',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Diego Eis',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Eduardo Shiota',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Giovanni Keppelen',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Luiz Corte Real',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Jaydson Gomes',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Reinaldo Ferraz',
            'active' => 1
        ]);

        Author::factory()->create([
            'name' => 'Sérgio Lopes',
            'active' => 1
        ]);

        //BooksAuthors
        BookAuthor::factory()->create([
            'author_id' => 1,
            'book_id' => 1,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 2,
            'book_id' => 2,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 3,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 4,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 5,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 6,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 7,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 8,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 9,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 10,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 11,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 12,
            'book_id' => 3,
            'active' => 1
        ]);

        BookAuthor::factory()->create([
            'author_id' => 13,
            'book_id' => 3,
            'active' => 1
        ]);

        //Loan
        Loan::factory()->create([
            'user_id' => 1,
            'loan_date' => now(),
            'devolution_date' => null,
            'active' => 1
        ]);

        //Loan Book
        LoanBook::factory()->create([
            'loan_id' => 1,
            'book_id' => 1,
            'active' => 1
        ]);

        LoanBook::factory()->create([
            'loan_id' => 1,
            'book_id' => 2,
            'active' => 1
        ]);

        //Loan
        Loan::factory()->create([
            'user_id' => 2,
            'loan_date' => now(),
            'devolution_date' => null,
            'active' => 1
        ]);

        //Loan Book
        LoanBook::factory()->create([
            'loan_id' => 2,
            'book_id' => 3,
            'active' => 1
        ]);


    }
}
