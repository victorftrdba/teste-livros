<?php

namespace App\Services;

use App\Models\Livro;

class LivroService
{
    public function create($request)
    {
        $livro = Livro::create($request->all());

        return $livro;
    }

    public function update($request, $id)
    {
        $livro = Livro::findOrFail($id);

        $livro->update($request->all());

        return $livro;
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);

        $livro->delete();

        return $livro;
    }
}
