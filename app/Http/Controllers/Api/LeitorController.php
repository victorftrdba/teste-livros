<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leitor;
use App\Services\LeitorService;
use Illuminate\Http\Request;

class LeitorController extends Controller
{
    private $leitorService;

    public function __construct()
    {
        $this->leitorService = new LeitorService;
    }

    public function index()
    {
        $leitores = Leitor::all()->toArray();

        return response()->json([
            'leitores' => $leitores,
        ]);
    }

    public function store(Request $request)
    {
        $leitor = $this->leitorService->create($request);

        return response()->json([
            'sucesso' => $leitor,
        ]);
    }

    public function update(Request $request, $id)
    {
        $leitor = $this->leitorService->update($request, $id);

        return response()->json([
            'sucesso' => 'Registro atualizado com sucesso.',
        ]);
    }

    public function destroy($id)
    {
        $leitor = $this->leitorService->destroy($id);

        return response()->json([
            'sucesso' => 'Registro excluído com sucesso.',
        ]);
    }

    public function storeReadBook(Request $request)
    {
        //
    }
}
