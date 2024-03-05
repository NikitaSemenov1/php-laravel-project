<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'user')->first();
        $book = Book::first();

        Order::create([
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);
    }
}
