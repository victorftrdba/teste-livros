<?php

namespace App\Services;

use App\Models\Leitor;

class LeitorService
{
    public function create($request)
    {
        $leitor = Leitor::create($request->all());

        return $leitor;
    }

    public function update($request, $id)
    {
        $leitor = Leitor::findOrFail($id);

        $leitor->update($request->all());

        return $leitor;
    }

    public function destroy($id)
    {
        $leitor = Leitor::findOrFail($id);

        $leitor->delete();

        return $leitor;
    }
}
