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

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'author'=> 'required',
            'isbn'=> 'required|size:13',
            'stock'=> 'required|numeric|integer|gte:0',
            'price' => 'required|numeric|gt:0' 
        ];

        $messages = [
            'stock.gte' => 'The stock must be greater than or equal to 0',
            'price.gt' => 'The price must be greater than 0'

        ];

        $request->validate($rules, $messages);
        
        //Option:1
        // $book = new Book();
        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->isbn = $request->isbn;
        // $book->stock = $request->stock;
        // $book->price = $request->price;
        // $book->save();
        
        // Option : 2
        // $data=[
        //     'title'=> $request->title,
        //     'author'=> $request->author,
        //     'isbn'=> $request->isbn,
        //     'stock' => $request->stock,
        //     'price'=> $request->price
        // ];
        // $book = Book::create($data);

        //Option : 3
        $book = Book::create($request->all());

        return redirect()->route('books.show', $book->id);
        // return redirect()->route('books.index');
    }

    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
