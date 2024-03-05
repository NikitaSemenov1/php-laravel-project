<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function list()
    {
        if (auth()->user()->hasRole('admin')) {
            $orders = Order::all();
        } else {
            $user = auth()->user();
            $orders = Order::where('user_id', $user->id)->get();
        }

        $books = [];

        foreach ($orders as $order) {
            $book = Book::find($order->book_id);
            $user = User::find($order->user_id);
            $book->username = $user->name;
            $books[] = $book;
    }

        return view('orders')->with('books', $books);
    }
    public function save(Request $request)
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect('books');
        }
        foreach ($request->all() as $book_id) {
            Order::create([
                'user_id' => $user->id,
                'book_id' => $book_id
            ]);
        }

        return redirect('books');
    }

}
