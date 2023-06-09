@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="row">
                <h2 class="mb-4">Visão geral</h2>

                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">Utilizadores</div>

                        <div class="card-body">
                            <div class="mt-2">
                                <h1 class="display-6">{{ $totalUsers }}</h1>
                                <h4>Utilizadores ativos</h4>
                            </div>

                            <hr class="my-4">

                            <div class=" row">
                                <div class="col">
                                    <h3>{{ $totalAdminUsers }}</h3>
                                    <p>Administradores</p>
                                </div>
                                <div class="col">
                                    <h3>{{ $totalFuncionarioUsers }}</h3>
                                    <p>Funcionários</p>
                                </div>
                                <div class="col">
                                    <h3>{{ $totalCustomerUsers }}</h3>
                                    <p>Clientes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">Filmes</div>

                        <div class="card-body">
                            <div class="mt-2">
                                <h1 class="display-6">{{ $totalFilmes }}</h1>
                                <h4>Filmes ativos</h4>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col">
                                    <h3>{{ $mostPopularGeneroName }}</h3>
                                    <p>Género com mais filmes</p>
                                </div>
                                <div class="col">
                                    <h3>{{ $leastPopularGeneroName }}</h3>
                                    <p>Género com menos filmes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body text-start">
                            <div class="mb-5">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ Auth::user()->getAvatarPath() }}" alt="user"
                                            class="rounded-circle img-fluid">
                                    </div>
                                    <div class="col-9 mt-2">
                                        <h5 class="mb-0">Olá,</h5>
                                        <h3 class="fw-bold">{{ Auth::user()->name }}</h3>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-unstyled">
                                <li class="mb-1">
                                    Perfil: <span class="fw-bold">{{ Auth::user()->getPrettyTipo() }}</span>
                                </li>
                                <li class="mb-1">
                                    Email: <span class="fw-bold">{{ Auth::user()->email }}</span>
                                </li>
                                <li class="mb-1">
                                    Data de registo: <span class="fw-bold">{{
                                        \Carbon\Carbon::parse(Auth::user()->created_at)->format('d M Y') }}</span>
                                </li>
                                <li class="mb-1">
                                    Última atualização: <span class="fw-bold">{{
                                        \Carbon\Carbon::parse(Auth::user()->updated_at)->format('d M Y, H:i:s')
                                        }}</span>
                                </li>
                            </ul>

                            <div class="mt-5">
                                <a href="{{ route('utilizadores.adminProfile') }}" class="btn btn-dark">
                                    Editar perfil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">Sessões</div>

                        <div class="card-body">
                            <div class="mt-2">
                                <h1 class="display-6">{{ $totalSessoesLast5Days }}</h1>
                                <h4>Sessões dos últimos 5 dias</h4>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col">
                                    <h3>{{ $totalSessoesLast30Days }}</h3>
                                    <p>Últimos 30 dias</p>
                                </div>
                                <div class="col">
                                    <h3>{{ $totalSessoesNext3Days }}</h3>
                                    <p>Próximos 3 dias</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">Salas</div>

                        <div class="card-body">
                            <div class="mt-2">
                                <h1 class="display-6">{{ $totalSalas }}</h1>
                                <h4>Salas</h4>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col">
                                    <h3>{{ $mostFrequentSalaData["nome"] }}</h3>
                                    <p>Sala mais popular</p>
                                </div>
                                <div class="col">
                                    <h3>{{ $leastFrequentSalaData["nome"] }}</h3>
                                    <p>Sala menos popular</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4 mt-4">
                    <div class="card text-center">
                        <div class="card-header">Bilhetes</div>

                        <div class="card-body">
                            <div class="mt-2">
                                <h1 class="display-6">{{ number_format($totalBilhetes, 0, ',', '.') }}</h1>
                                <h4>Bilhetes vendidos</h4>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col">
                                    <h3>{{ number_format($totalRevenueValueFiveDays, 2, ',', '.') }} €</h3>
                                    <p>Últimos 5 dias</p>
                                </div>
                                <div class="col">
                                    <h3>{{ number_format($totalRevenueValueThirtyDays, 2, ',', '.') }} €</h3>
                                    <p>Últimos 30 dias</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col">
                                    <div class="progress mb-3" style="height: 25px; font-size: 1.05em;">
                                        <div class="progress-bar bg-success"
                                            style="width: {{ number_format($percentagemUsados, 2) }}%;">
                                            {{ number_format($percentagemUsados, 0) }}%
                                        </div>
                                        <div class="progress-bar bg-danger"
                                            style="width: {{ number_format($percentagemNaoUsados, 2) }}%">
                                            {{ number_format($percentagemNaoUsados, 0) }}%
                                        </div>
                                    </div>
                                    <p>Usados vs. Não Usados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
