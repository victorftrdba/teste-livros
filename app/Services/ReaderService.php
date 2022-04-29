<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Reader;

class ReaderService
{
    public function create($request)
    {
        $reader = Reader::create($request->all());

        return $reader;
    }

    public function update($request, $id)
    {
        $reader = Reader::findOrFail($id);

        $reader->update($request->all());

        return $reader;
    }

    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);

        $reader->delete();

        return $reader;
    }

    public function storeReadBook($request, $id)
    {
        $reader = Reader::findOrFail($id);
        $book = Book::findOrFail($request->get('book_id'))->toArray();

        $reader->books()->create($book);

        return $reader;
    }
}
