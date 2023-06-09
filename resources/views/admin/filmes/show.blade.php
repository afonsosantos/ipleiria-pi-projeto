@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="mb-4">
                <h2><i class="fa-solid fa-video me-3"></i>{{ $filme->titulo }}</h2>
            </div>

            <div class="card">
                <div class="card-header">Visualizar filme</div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título*</label>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                    value="{{ $filme->titulo }}" readonly>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div>
                                        <label for="ano" class="form-label">Ano*</label>
                                        <input type="text" class="form-control" id="ano" name="ano"
                                            value="{{ $filme->ano }}" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label for="genero_code" class="form-label">Género</label>
                                        <select class="form-select" id="genero_code" name="genero_code" disabled>
                                            @foreach ($generos as $genero)
                                            <option {{ $filme->genero_code==$genero->code ? 'selected' : '' }}
                                                value="{{ $genero->code }}">{{ $genero->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row align-items-end">
                                    <div class="col-10">
                                        <label for="trailer_url" class="form-label">URL do Trailer</label>
                                        <input type="text" class="form-control" id="trailer_url" name="trailer_url"
                                            value="{{ $filme->trailer_url }}" readonly>
                                    </div>
                                    @if ($filme->trailer_url != null)
                                    <div class="col-2">
                                        <a href="{{ $filme->trailer_url }}" class="btn btn-dark d-block"
                                            target="_blank">
                                            <i class="fa-solid fa-up-right-from-square me-1"></i> Abrir
                                        </a>
                                    </div>
                                    @endif
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="sumario" class="form-label">Sumário</label>
                                <textarea class="form-control" id="sumario" name="sumario" rows="6"
                                    readonly>{{ $filme->sumario }}</textarea>
                            </div>
                        </div>

                        <div class="col-4">
                            <a href="{{ $filme->getCartazPath() }}" target="_blank">
                                <img src="{{ $filme->getCartazPath() }}" class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2">
                            <a href="{{ route('filmes.index') }}" class="btn btn-dark d-block">
                                <i class="fa-solid fa-left-long me-2"></i> Voltar à lista
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection