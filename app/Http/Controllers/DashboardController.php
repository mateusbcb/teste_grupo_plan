<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eletrodomestico;
use App\Models\Marca;

class DashboardController extends Controller
{
    /**
     * dASHBOARD
     */
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
