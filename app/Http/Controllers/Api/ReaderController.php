<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reader;
use App\Services\ReaderService;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    private $readerService;

    public function __construct()
    {
        $this->readerService = new ReaderService;
    }

    public function index()
    {
        $leitores = Reader::with('books')->get();

        return response()->json([
            'readers' => $leitores,
        ]);
    }

    public function store(Request $request)
    {
        $reader = $this->readerService->create($request);

        return response()->json([
            'success' => $reader,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->readerService->update($request, $id);

        return response()->json([
            'success' => 'Data updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $this->readerService->destroy($id);

        return response()->json([
            'success' => 'Data deleted successfully.',
        ]);
    }

    public function storeReadBook(Request $request)
    {
        //
    }
}
