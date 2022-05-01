<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Reader;
use Hash;

class ReaderService
{
    public function authenticate($request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|password'
        ]);

        $reader = Reader::where('email', $request->email)->first();

        if ($reader && Hash::check($request->password, $reader->password)) {
            return $reader->createToken($reader->name);
        }
    }

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

    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);

        return $reader->delete();
    }

    public function storeReadBook($request, $id)
    {
        $request->validate([
            'book_id' => 'required|numeric',
        ]);

        $reader = Reader::findOrFail($id);
        $book = Book::findOrFail($request->book_id)->toArray();

        return $reader->books()->create($book);
    }
}
