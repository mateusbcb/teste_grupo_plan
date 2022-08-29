@extends('layouts.app')

@section('content')
    <div class="container my-5 text-white">
        <div class="card text-bg-dark border-0 shadow">
            <div class="card-body">

                <h3 class="card-title mb-5 mt-2">Dashboard</h3>

                <div class="container text-center">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">

                        <div class="col">
                            <a href="{{ route('eletrodomesticos') }}" class="btn btn-warning p-4 position-relative">
                                eletrodomesticos
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                    {{ count($eletrodomesticos) }}
                                </span>
                            </a>
                        </div>

                        <div class="col">
                            <a href="#" class="btn btn-warning p-4 position-relative">
                                Marcas
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                    {{ count($marcas) }}
                                </span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
