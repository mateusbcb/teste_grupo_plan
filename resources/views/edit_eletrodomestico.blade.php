@extends('layouts.app')

@section('content')
    <div class="container my-5 text-white">

        <div class="card text-bg-dark border-0 shadow">
            <div class="card-body">

                <div class="text-start">
                    <a href="{{ route('eletrodomesticos') }}" class="btn btn-warning shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>

                        Voltar
                    </a>
                </div>

                <h3 class="card-title mb-5 mt-5">Editar - {{ $eletrodomestico->nome }}</h3>


                <p class="card-text">
                    <form action="{{ route('eletrodomestico.salvar', ['id' => {{ $eletrodomestico->id }}]) }}" method="POST">
                        @csrf

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="nome" id="nome"  placeholder="Nome do Eletrodoméstico" required value="{{ $eletrodomestico->nome }}">
                            <label for="nome" class="text-black">Nome do Eletrodoméstico</label>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" style="height: 200px" placeholder="Descrição" name="descricao" id="descricao" required>{{ $eletrodomestico->descricao }}</textarea>
                            <label for="descricao" class="text-black">Descrição</label>
                        </div>

                        <div class="col">
                            <div class="row">

                                <div class="col">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" name="tensao" id="tensao" aria-label="Tensão" required>
                                            <option value="null" @if($eletrodomestico->tensao == 'null') selected @else '' @endif>Selecione a tensão</option>
                                            <option value="110v" @if($eletrodomestico->tensao == '110v') selected @else '' @endif>110v</option>
                                            <option value="220v" @if($eletrodomestico->tensao == '220v') selected @else '' @endif>220v</option>
                                        </select>
                                        <label for="tensao">Selecione a tensão</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" name="marca_id" id="marca_id" aria-label="Marca" required>
                                            <option value="null">Selecione a Marca</option>
                                            @forelse ($marcas as $marca)
                                                <option value="{{ $marca->id }}" @if($eletrodomestico->marca_id == $marca->id) selected @else '' @endif>{{ $marca->nome }}</option>
                                            @empty
                                                <option value="null">---</option>
                                            @endforelse
                                        </select>
                                        <label for="marca">Selecione a marca</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col">
                            <div class="row">

                                <div class="col">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="preco" i d="preco" placeholder="Preço" value="{{ $eletrodomestico->preco }}">
                                        <label for="preco" class="text-black">Preço</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" name="cor" id="cor" aria-label="Cor" required>
                                            <option value="null" @if($eletrodomestico->cor == 'null') selected @else '' @endif>Selecione a cor</option>
                                            <option value="Branco" @if($eletrodomestico->cor == 'Branco') selected @else '' @endif class="bg-white text-black">Branco</option>
                                            <option value="Preto" @if($eletrodomestico->cor == 'Preto') selected @else '' @endif class="bg-black text-white">Preto</option>
                                            <option value="Chumbo" @if($eletrodomestico->cor == 'Chumbo') selected @else '' @endif class="bg-dark text-white">Chumbo</option>
                                            <option value="Cinza" @if($eletrodomestico->cor == 'Cinza') selected @else '' @endif class="bg-secondary text-white">Cinza</option>
                                            <option value="Cinza escovado" @if($eletrodomestico->cor == 'Cinza escovado') selected @else '' @endif class="text-white" style="background: rgb(88, 88, 88);">Cinza escovado</option>
                                            <option value="Vermelho" @if($eletrodomestico->cor == 'Vermelho') selected @else '' @endif class="bg-danger text-white">Vermelho</option>
                                            <option value="Amarelo" @if($eletrodomestico->cor == 'Amarelo') selected @else '' @endif class="text-black" style="background: yellow;">Amarelo</option>
                                            <option value="Azul" @if($eletrodomestico->cor == 'Azul') selected @else '' @endif class="text-white" style="background: blue;">Azul</option>
                                            <option value="Verde" @if($eletrodomestico->cor == 'Verde') selected @else '' @endif class="text-white" style="background: green;">Verde</option>
                                        </select>
                                        <label for="cor">Selecione a cor do eletrodomestico</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-auto mt-2">
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>

                    </form>
                </p>

            </div>
        </div>

    </div>
@endsection
