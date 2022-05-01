<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * @var BookService
     */
    private $bookService;

    /**
     *
     */
    public function __construct()
    {
        $this->bookService = new BookService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'books' => $books,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $book = $this->bookService->create($request);

        return response()->json([
            'success' => $book,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->bookService->update($request, $id);

        return response()->json([
            'success' => 'Data updated successfully.',
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->bookService->destroy($id);

        return response()->json([
            'success' => 'Data deleted successfully.',
        ]);
    }
}
