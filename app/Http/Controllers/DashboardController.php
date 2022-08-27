<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eletrodomestico;
use App\Models\Marca;

class DashboardController extends Controller
{
    public function index()
    {
        $eletrodomesticos = Eletrodomestico::with('marca')->paginate(10)->withQueryString();
        $marcas = Marca::all();

        return view('dashboard', [
            'eletrodomesticos' => $eletrodomesticos,
            'marcas' => $marcas
        ]);
    }

    public function eletrodomestico($id)
    {
        $eletrodomestico = Eletrodomestico::find($id);

        return view('eletrodomestico', [
            'eletrodomestico' => $eletrodomestico,
        ]);
    }
}
