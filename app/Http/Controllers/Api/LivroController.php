<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use App\Services\LivroService;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    private $livroService;

    public function __construct()
    {
        $this->livroService = new LivroService;
    }

    public function index()
    {
        $livros = Livro::all()->toArray();

        return response()->json([
            'livros' => $livros,
        ]);
    }

    public function store(Request $request)
    {
        $livro = $this->livroService->create($request);

        return response()->json([
            'success' => $livro,
        ]);
    }

    public function update(Request $request, $id)
    {
        $leitor = $this->livroService->update($request, $id);

        return response()->json([
            'sucesso' => 'Registro atualizado com sucesso.',
        ]);
    }

    public function destroy($id)
    {
        $leitor = $this->livroService->destroy($id);

        return response()->json([
            'sucesso' => 'Registro excluído com sucesso.',
        ]);
    }
}
