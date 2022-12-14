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

                <h3 class="card-title mb-5 mt-5">Eletrodoméstico - {{ $eletrodomestico->nome }}</h3>


                <p class="card-text">
                    <div class="table-responsive">
                        <table class="table table-dark table-sm">
                            <tbody>
                                <tr>
                                    <td class="bg-black w-25 text-center">Nome</td>
                                    <td class="bg-white text-black">{{ $eletrodomestico->nome }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-black w-25 text-center">Descrição</td>
                                    <td class="bg-white text-black">{{ $eletrodomestico->descricao }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-black w-25 text-center">Tensão</td>
                                    <td class="bg-white text-black">{{ $eletrodomestico->tensao }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-black w-25 text-center">Marca</td>
                                    <td class="bg-white text-black">{{ $eletrodomestico->marca->nome }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-black w-25 text-center">Preço</td>
                                    <td class="bg-white text-black">R$ {{ $eletrodomestico->preco }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-black w-25 text-center">Cor</td>
                                    <td class="bg-white text-black">{{ $eletrodomestico->cor }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </p>

            </div>
        </div>

    </div>
@endsection
