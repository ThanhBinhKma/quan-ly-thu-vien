<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', ['books' => $books]);
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit', ['book' => $book]);
    }

    public function update($id,BookCreateRequest $request)
    {
        $book = Book::find($id);
        $book->book_name = $request->book_name;
        $book->book_code = $request->book_code;
        $book->author = $request->author;
        $book->status = $request->status;
        $book->save();
        return redirect()->route('admin.book.index');
    }

    public function store(BookCreateRequest $request)
    {
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->book_code = $request->book_code;
        $book->author = $request->author;
        $book->status = $request->status;
        $book->save();
        return redirect()->route('admin.book.index');
    }

    public function delete($id)
    {
        Book::where('id', $id)->delete();
        return redirect()->route('admin.book.index');
    }
}
