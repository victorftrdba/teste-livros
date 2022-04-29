<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Reader;

class ReaderService
{
    public function create($request)
    {
        return Reader::create($request->all());
    }

    public function update($request, $id)
    {
        $reader = Reader::findOrFail($id);

        return $reader->update($request->all());
    }

    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);

        return $reader->delete();
    }

    public function storeReadBook($request, $id)
    {
        $reader = Reader::findOrFail($id);
        $book = Book::findOrFail($request->get('book_id'))->toArray();

        return $reader->books()->create($book);
    }
}
