<?php

namespace App\Repositories;

use App\Http\Requests\EditBookRequest;
use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BookRepository
{
    private Book $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAll()
    {
        $books = $this->book->all();

        return $books->all();
    }

    public function getById(int $id)
    {
        return $this->book->find($id);
    }

    public function create(Request $data)
    {
        $this->book->create($this->makePayload($data));
    }

    public function edit(EditBookRequest $request)
    {
        if(!$this->bookExistById($request['id']))
            return;

        $this->book->where('id', $request['id'])
            ->update($this->makePayload($request));
    }

    public function delete(int $id)
    {
        if(!$this->bookExistById($id))
            return;

        $this->book->destroy($id);
    }

    protected function makePayload(FormRequest $request)
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

    public function bookExistById(int $id)
    {
        $book = $this->book->find($id);

        if ($book) return true;

        return false;
    }
}
