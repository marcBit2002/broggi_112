@extends('layouts.admin_template', ['activeNav' => $activeNav])
@section('titulo')
    EXPEDIENTS
@endsection

@section('contenido')
    <div class="selection">
        <select class="form-select">
            <option selected>Estat</option>
            @foreach ($estats as $estat)
                <option value="{{ $estat->id }}">{{ $estat->estat }}</option>
            @endforeach
        </select>
        <select class="form-select">
            <option selected>Tipus</option>
            @foreach ($tipusIncidents as $tipusIncident)
                <option value="{{ $tipusIncident->id }}">{{ $tipusIncident->nom }}</option>
            @endforeach
        </select>
        <div class='search'>
            <div class="input-group">
                <span class="input-group-text border border-primary border-3 border-end-0 text-warning">
                    <i class="bi bi-search"></i>
                </span>
                <input type="search" class="form-control border border-3 border-start-0 border-primary"
                    placeholder="Buscar" />
            </div>
        </div>
    </div>
    <div class='expedients'>
        @foreach ($expedients as $expedient)
            <div class='expedient'>
                @if (Auth::check() && Auth::user()->roles->nom === 'Administrador Sistema')
                    <a class="nav-link"
                        href="{{ action([App\Http\Controllers\InfoExpedientController::class, 'edit'], ['infoExpedient' => $expedient->id]) }}">
                    @else
                        <a class="nav-link"
                            href="{{ action([App\Http\Controllers\InfoExpedientSupController::class, 'edit'], ['infoExpedient' => $expedient->id]) }}">
                @endif
                <div class='top-expedient'>
                    <div class='data'>
                        @foreach ($expedient->cartesTrucades as $carta)
                            {{ substr($carta->data_hora_trucada, 0, 10) }}
                        @endforeach
                    </div>
                    <div class='tipus'>
                        @foreach ($tipusIncidentsExpUq as $tipusIncidentExp)
                            {{ $tipusIncidentExp }},
                        @endforeach
                    </div>
                </div>
                <div class='bottom-expedient'>
                    <div class='codi'>Codi: <b>{{ $expedient->codi }}</b></div>
                    <div class='estat' value="{{ $expedient->estat_expedients_id }}">
                        {{ $expedient->estatExpedient->estat }}<span class="dot"
                            style="background-color: {{ $expedient->estatExpedient->color }};"></span>
                    </div>
                </div>
                </a>
            </div>
        @endforeach
        {{ $expedients->links() }}
    </div>
@endsection
