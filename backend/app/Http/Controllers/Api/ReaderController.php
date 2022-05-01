<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reader;
use App\Services\ReaderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ReaderController extends Controller
{
    /**
     * @var ReaderService
     */
    private $readerService;

    /**
     *
     */
    public function __construct()
    {
        $this->readerService = new ReaderService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $token = $this->readerService->authenticate($request);

        return response()->json($token);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $readers = Reader::orderBy('created_at', 'DESC')->with('books')->get();

        return response()->json([
            'readers' => $readers,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $reader = $this->readerService->create($request);

        return response()->json([
            'success' => $reader,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->readerService->update($request, $id);

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
        $this->readerService->destroy($id);

        return response()->json([
            'success' => 'Data deleted successfully.',
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeReadBook(Request $request, $id)
    {
        $response = $this->readerService->storeReadBook($request, $id);

        return response()->json([
            'success' => $response,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function seeReaderBooks(Request $request, $id)
    {
        return response()->json([
            'books' => json_decode(Redis::get('reader_books_'.$id)),
        ]);
    }
}
