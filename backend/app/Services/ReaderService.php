<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Reader;
use Hash;

class ReaderService
{
    public function authenticate($request)
    {
        $reader = Reader::where('email', $request->get('email'))->first();

        if ($reader && Hash::check($request->get('password'), $reader->password)) {
            return $reader->createToken($reader->name);
        }
    }

    public function create($request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'birthday' => $request->get('birthday'),
            'password' => Hash::make($request->get('password')),
        ];

        return Reader::create($data);
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
