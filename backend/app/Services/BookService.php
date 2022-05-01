<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    /**
     * @param $request
     * @return mixed
     */
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

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $book = Book::findOrFail($id);

        return $book->update($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        return $book->delete();
    }
}
