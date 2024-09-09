<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    
    public function index()
    {
        // $books = Book::all();
        // $books = Book::where('price', '<', 20)->get();
        // $books = Book::take(10)->get();
        // $books = Book::whereBetween('price', [10,20])->get();
        // $books = Book::whereBetween('price', [10,20])->tosql();
        // $books = Book::whereBetween('price', [10,15])->orderBy('title')->get();
        // $books = Book::whereBetween('price', [10,20])->orderBy('title')->tosql();

        // return $books;

        // dd($books);

        $books = Book::paginate(10);
        return view('books.index')->with('books', $books);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show')->with('book', $book);
    }
}
