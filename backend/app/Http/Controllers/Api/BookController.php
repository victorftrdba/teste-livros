<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookService;

    public function __construct()
    {
        $this->bookService = new BookService;
    }

    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        $book = $this->bookService->create($request);

        return response()->json([
            'success' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->bookService->update($request, $id);

        return response()->json([
            'success' => 'Data updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $this->bookService->destroy($id);

        return response()->json([
            'success' => 'Data deleted successfully.',
        ]);
    }
}
