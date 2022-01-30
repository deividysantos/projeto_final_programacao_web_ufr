<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getListAllBooks()
    {
        $books = Book::all();
        return view('index', compact(['books']));
    }

    public function getFormNewBook()
    {
        return view('form');
    }

    public function getFormEditBook(string $bookId)
    {
        if(!$this->bookExistById($bookId))
            return redirect()->route('view.index');

        $book = Book::find($bookId);

        return view('form', compact('book'));
    }

    public function postCreateNewBook(Request $request)
    {
        $request->validate([
            'title' => 'required | max:255',
            'author' => 'required | max: 255',
            'ISBN' => 'required',
            'price' => 'required | numeric',
            'publishingCompany' => 'required | string | max: 255',
            'releaseYear' => 'required | string'
        ]);

        $payload = $this->makePayload($request);

        Book::create($payload);

        return redirect()->route('view.index');
    }

    public function postEditBook(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required | max:255',
            'author' => 'required | max: 255',
            'ISBN' => 'required',
            'price' => 'required | numeric',
            'publishingCompany' => 'required | string | max: 255',
            'releaseYear' => 'required | string'
        ]);

        if($this->bookExistById($request['id']))
            Book::where('id', $request['id'])
                ->update($this->makePayload($request));

        return redirect()->route('view.index');
    }

    public function postDelete($id)
    {
        if($this->bookExistById($id))
            Book::destroy($id);

        return redirect()->route('view.index');
    }

    protected function bookExistById($id)
    {
        $book = Book::find($id);

        if ($book) return true;

        return false;
    }

    protected function makePayload(Request $request)
    {
        return
            [
                'title' => $request['title'],
                'author' => $request['author'],
                'ISBN' => $request['ISBN'],
                'price' => $request['price'],
                'publishingCompany' => $request['publishingCompany'],
                'releaseYear' => $request['releaseYear']
            ];
    }
}
