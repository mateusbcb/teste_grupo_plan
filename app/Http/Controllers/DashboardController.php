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
        $eletrodomestico = Eletrodomestico::with('marca')->find($id);

        return view('eletrodomestico', [
            'eletrodomestico' => $eletrodomestico,
        ]);
    }

    public function create()
    {
        $marcas = Marca::all();

        return view('create_eletrodomestico', [
            'marcas' => $marcas,
        ]);
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:4',
            'tensao' => 'required',
            'marca_id' => 'required',
        ];

        $menssagem = [
            'required' => 'O campo, ::attributes é obrigatório',
        ];

        $valido = $request->validate($regras, $menssagem);

        if ( ($valido['nome'] != 'null') || ($valido['tensao'] != 'null') || ($valido['marca_id'] != 'null') ) {
            $eletrodomestico = new Eletrodomestico();

            $criado = $eletrodomestico->create($request->all());

            if ($criado) {
                return redirect()->route('dashboard')->with('sucess', 'Eletrodomestico criado com sucesso!');
            }else {
                return redirect()->route('dashboard')->with('error', 'Falha ao criar Eletrodomestico!');
            }

        }else {
            return redirect()->back()->with('error', 'Preencha todos os campos obrigatórios!')->withInput();
        }
    }

    public function edit($id)
    {
        $marcas = Marca::all();
        $eletrodomestico = Eletrodomestico::with('marca')->find($id);

        return view('edit_eletrodomestico', [
            'marcas' => $marcas,
            'eletrodomestico' => $eletrodomestico,
        ]);
    }

    public function edit_save(Request $request)
    {
        $regras = [
            'nome' => 'required|min:4',
            'tensao' => 'required',
            'marca_id' => 'required',
        ];

        $menssagem = [
            'required' => 'O campo, ::attributes é obrigatório',
        ];

        $valido = $request->validate($regras, $menssagem);

        if ( ($valido['nome'] != 'null') || ($valido['tensao'] != 'null') || ($valido['marca_id'] != 'null') ) {
            $eletrodomestico = new Eletrodomestico();

            $atualizado = $eletrodomestico->find($request->id)->update([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'tensao' => $request->tensao,
                'marca_id' => $request->marca_id,
                'preco' => $request->preco,
                'cor' => $request->cor,
                'update_at' => now(),
            ]);

            if ($atualizado) {
                return redirect()->route('dashboard')->with('sucess', 'Eletrodomestico Editado com sucesso!');
            }else {
                return redirect()->route('dashboard')->with('error', 'Falha ao Editar Eletrodomestico!');
            }

        }else {
            return redirect()->back()->with('error', 'Preencha todos os campos obrigatórios!')->withInput();
        }
    }

    public function delete($id)
    {
        $eletrodomestico = Eletrodomestico::find($id);

        $deletou = $eletrodomestico->delete();

        if ($deletou) {
            return redirect()->route('dashboard')->with('sucess', 'Eletrodomestico Deletado com sucesso!');
        }else {
            return redirect()->route('dashboard')->with('error', 'Falha ao Deletar Eletrodomestico!');
        }
    }
}
