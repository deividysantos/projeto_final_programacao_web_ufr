<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewBookRequest;
use App\Http\Requests\EditBookRequest;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getListAllBooks()
    {
        $books = $this->bookRepository->getAll();
        return view('index', compact(['books']));
    }

    public function getFormNewBook()
    {
        return view('form');
    }

    public function getFormEditBook(string $bookId)
    {
        if(!$this->bookRepository->bookExistById($bookId))
            return redirect()->route('view.index');

        $book = $this->bookRepository->getById($bookId);

        return view('form', compact('book'));
    }

    public function postCreateNewBook(CreateNewBookRequest $request)
    {
        $this->bookRepository->create($request);

        return redirect()->route('view.index');
    }

    public function postEditBook(EditBookRequest $request)
    {
        $this->bookRepository->edit($request);

        return redirect()->route('view.index');
    }

    public function postDelete($id)
    {
        $this->bookRepository->delete($id);

        return redirect()->route('view.index');
    }
}
