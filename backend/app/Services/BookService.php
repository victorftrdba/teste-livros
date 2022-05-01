<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function create($request)
    {
        $data = [
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'author' => $request->get('author'),
            'pages' => $request->get('pages'),
            'year' => $request->get('year'),
            'language' => $request->get('language'),
            'edition' => $request->get('edition'),
            'editor' => [
                'name' => $request->get('editor')['name'],
                'code' => $request->get('editor')['code'],
                'phone' => $request->get('editor')['phone'],
            ],
            'isbn' => $request->get('isbn'),
        ];

        return Book::create($data);
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
