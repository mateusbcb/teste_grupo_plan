@extends('layouts.app')

@section('content')
    <div class="container my-5 text-white">

        <div class="card text-bg-dark border-0 shadow">
            <div class="card-body">

                <div class="text-start">
                    <a href="{{ route('dashboard') }}" class="btn btn-warning shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                        </svg>

                        Voltar
                    </a>
                </div>

                <h3 class="card-title mb-5 mt-5">Criar novo Eletrodoméstico</h3>


                <p class="card-text">
                    <form action="{{ route('eletrodomestico.store') }}" method="POST">
                        @csrf

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Eletrodoméstico" required>
                            <label for="nome" class="text-black">Nome do Eletrodoméstico</label>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" style="height: 200px" placeholder="Descrição" name="descricao" id="descricao" required></textarea>
                            <label for="descricao" class="text-black">Descrição</label>
                        </div>

                        <div class="col">
                            <div class="row">

                                <div class="col">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" name="tensao" id="tensao" aria-label="Tensão" required>
                                            <option value="null">Selecione a tensão</option>
                                            <option value="110v">110v</option>
                                            <option value="220v">220v</option>
                                        </select>
                                        <label for="tensao">Selecione a tensão</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" name="marca_id" id="marca_id" aria-label="Marca" required>
                                            <option value="null">Selecione a Marca</option>
                                            @forelse ($marcas as $marca)
                                                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
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
                                        <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço">
                                        <label for="preco" class="text-black">Preço</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" name="cor" id="cor" aria-label="Cor" required>
                                            <option value="null">Selecione a cor</option>
                                            <option value="Branco" class="bg-white text-black">Branco</option>
                                            <option value="Preto" class="bg-black text-white">Preto</option>
                                            <option value="Chumbo" class="bg-dark text-white">Chumbo</option>
                                            <option value="Cinza" class="bg-secondary text-white">Cinza</option>
                                            <option value="Cinza escovado" class="text-white" style="background: rgb(88, 88, 88);">Cinza escovado</option>
                                            <option value="Vermelho" class="bg-danger text-white">Vermelho</option>
                                            <option value="Amarelo" class="text-black" style="background: yellow;">Amarelo</option>
                                            <option value="Azul" class="text-white" style="background: blue;">Azul</option>
                                            <option value="Verde" class="text-white" style="background: green;">Verde</option>
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
