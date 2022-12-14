@extends('layouts.app')

@section('content')
    <div class="container my-5 text-white">

        <div class="card text-bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="card-title mb-5 mt-2">Eletrodomésticos</h3>

                <div class="col">

                    <div class="row">
                        <div class="text-end">
                            <a href="{{ route('eletrodomestico.novo') }}" class="btn btn-warning shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                </svg>

                                Criar Novo
                            </a>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col col-lg-2">
                            <div class="row p-4 mt-2">
                                <p class="text-center fw-semibold fs-5 border-2 border-bottom">
                                    Marcas
                                </p>
                                <a href="{{ route('eletrodomesticos') }}" class="btn btn-outline-secondary mb-2">Todas</a>

                                @forelse ($marcas as $marca)
                                    <a href="{{ route('eletrodomestico.filter', ['marca_id' => $marca->id]) }}" class="btn btn-outline-secondary mb-2">{{ $marca->nome }}</a>
                                @empty
                                    <p>Nenhuma Marca</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="col">
                            <p class="card-text">
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover table-borderless table-sm text-center">
                                        <thead class="border-1 border-bottom border-warning text-warning">
                                            <tr>
                                                <th scope="col" style="width: auto;">ID</th>
                                                <th scope="col" style="width: 30%;">Nome</th>
                                                <th scope="col" style="width: 30%;">Descrição</th>
                                                <th scope="col" style="width: 10%;">Tensão</th>
                                                <th scope="col" style="width: 10%;">Marcas</th>
                                                <th scope="col" style="width: 15%;">Açoes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($eletrodomesticos as $eletrodomestico)
                                                <tr class="border-1 border-bottom border-secondary">
                                                    <th>{{ $eletrodomestico->id }}</th>
                                                    <td class="text-truncate" style="max-width: 0;">{{ $eletrodomestico->nome }}</td>
                                                    <td class="text-truncate" style="max-width: 0;">{{ $eletrodomestico->descricao }}</td>
                                                    <td>{{ $eletrodomestico->tensao }}</td>
                                                    <td>{{ $eletrodomestico->marca->nome }}</td>
                                                    <td class="d-flex justify-content-end">
                                                        <a href="{{ route('eletrodomestico', ['id' => $eletrodomestico->id]) }}" class="btn btn-dark text-info mx-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                            </svg>
                                                        </a>

                                                        <a href="{{ route('eletrodomestico.editar', ['id' => $eletrodomestico->id]) }}" class="btn btn-dark text-success mx-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                            </svg>
                                                        </a>

                                                        <form action="{{ route('eletrodomestico.delete', ['id' => $eletrodomestico->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-dark text-danger mx-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>Nenhum eletrodomestico encontrado!</p>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </p>

                            <div class="text-end">
                                {{ $eletrodomesticos->links() }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
