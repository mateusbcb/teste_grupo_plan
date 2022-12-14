<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eletrodomestico;
use App\Models\Marca;

class EletrodomesticosController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index(Request $request)
    {
        $eletrodomesticos = Eletrodomestico::with('marca')->paginate(10)->withQueryString();
        $marcas = Marca::all();

        $api = $request->is('api/*');

        if ($api) {
            return response()->json($eletrodomesticos, 200);
        }else {
            return view('eletrodomesticos', [
                'eletrodomesticos' => $eletrodomesticos,
                'marcas' => $marcas
            ]);
        }
    }

    /**
     * Display the specified resource.
    */
    public function show(Request $request, $id)
    {
        $eletrodomestico = Eletrodomestico::with('marca')->find($id);

        $api = $request->is('api/*');

        if ($api) {
            return response()->json($eletrodomestico, 200);
        }else {
            return view('eletrodomestico', [
                'eletrodomestico' => $eletrodomestico,
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $marcas = Marca::all();

        return view('create_eletrodomestico', [
            'marcas' => $marcas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
    */
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

            $api = $request->is('api/*');

            if ($api) {
                return response()->json($criado, 200);
            }else {

                if ($criado) {
                    return redirect()->route('eletrodomesticos')->with('success', 'Eletrodoméstico criado com sucesso!');
                }else {
                    return redirect()->route('eletrodomesticos')->with('error', 'Falha ao criar Eletrodomestico!');
                }

            }


        }else {
            return redirect()->back()->with('error', 'Preencha todos os campos obrigatórios!')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
        $marcas = Marca::all();
        $eletrodomestico = Eletrodomestico::with('marca')->find($id);

        return view('edit_eletrodomestico', [
            'marcas' => $marcas,
            'eletrodomestico' => $eletrodomestico,
        ]);
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
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

            $atualizado = $eletrodomestico->find($id)->update([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'tensao' => $request->tensao,
                'marca_id' => $request->marca_id,
                'preco' => $request->preco,
                'cor' => $request->cor,
                'update_at' => now(),
            ]);

            $eletrodomestico_atualizado = $eletrodomestico->where('id', $id)->with('marca')->get();

            $api = $request->is('api/*');

            if ($api) {
                return response()->json($eletrodomestico_atualizado, 200);
            }else {

                if ($atualizado) {
                    return redirect()->route('eletrodomesticos')->with('success', 'Eletrodoméstico Editado com sucesso!');
                }else {
                    return redirect()->route('eletrodomesticos')->with('error', 'Falha ao Editar Eletrodomestico!');
                }
            }


        }else {
            return redirect()->back()->with('error', 'Preencha todos os campos obrigatórios!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Request $request, $id)
    {
        $eletrodomestico = Eletrodomestico::find($id);

        $deletou = $eletrodomestico->delete();

        $api = $request->is('api/*');

        if ($api) {
            return response()->json($eletrodomestico, 200);
        }else {
            if ($deletou) {
                return redirect()->route('eletrodomesticos')->with('success', 'Eletrodoméstico Deletado com sucesso!');
            }else {
                return redirect()->route('eletrodomesticos')->with('error', 'Falha ao Deletar Eletrodomestico!');
            }
        }
    }

    public function filter(Request $request, $marca_id)
    {
        $eletrodomestico = new Eletrodomestico();

        $marcas = Marca::all();

        $resultado = $eletrodomestico->where('marca_id', $marca_id)->with('marca')->paginate(10);

        return view('eletrodomesticos', [
            'eletrodomesticos' => $resultado,
            'marcas' => $marcas
        ]);
    }
}
