<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function create($request)
    {
        return Book::create($request->all());
    }

    public function update($request, $id)
    {
        $book = Book::findOrFail($id);

        return $book->update($request->all());
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        return $book->delete();
    }
}
