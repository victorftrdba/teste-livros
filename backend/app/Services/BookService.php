<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function create($request)
    {
        $livro = Book::create($request->all());

        return $livro;
    }

    public function update($request, $id)
    {
        $livro = Book::findOrFail($id);

        $livro->update($request->all());

        return $livro;
    }

    public function destroy($id)
    {
        $livro = Book::findOrFail($id);

        $livro->delete();

        return $livro;
    }
}
