<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function showBooks() {
        $books = Book::all();

        return view('index', compact('books'));
    }
}
