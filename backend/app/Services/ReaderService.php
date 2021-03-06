<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Reader;
use Hash;
use Illuminate\Support\Facades\Redis;

class ReaderService
{
    /**
     * @param $request
     * @return void
     */
    public function authenticate($request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $reader = Reader::where('email', $request->email)->first();

        if ($reader && Hash::check($request->password, $reader->password)) {
            return $reader->createToken($reader->name);
        }
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mongodb.readers,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'birthday' => 'required|date',
            'password' => 'required|string'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
        ];

        return Reader::create($data);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mongodb.readers,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'birthday' => 'required|date',
            'password' => 'required|string'
        ]);

        $reader = Reader::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
        ];

        return $reader->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);

        return $reader->delete();
    }

    /**
     * @param $request
     * @param $id
     * @return string
     */
    public function storeReadBook($request, $id)
    {
        $request->validate([
            'book_id' => 'required',
        ]);

        $reader = Reader::findOrFail($id);
        $book = Book::findOrFail($request->book_id)->toArray();

        foreach ($reader->books as $reader_book) {
            if ($reader_book->name == $book['name']) {
                return "Livro j?? foi marcado como lido pelo usu??rio!";
            }
        }

        $reader->books()->create($book);

        Redis::set('reader_books_'.$reader->_id, json_encode($reader->books));

        return "Livro marcado como lido com sucesso!";
    }
}
