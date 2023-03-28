@extends('layouts.admin_template', ['activeNav' => $activeNav])
@section('titulo')
    EXPEDIENTS
@endsection

@section('contenido')
    <div class="selection">
        <div class="dropdown-center me-3">
            <button class="btn btn-outline-primary button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class='btn_content'>Estat<span class="arrow"></span></div>
            </button>
            <ul class="dropdown-menu">
                @foreach ($estats as $estat)
                    <li><a class="dropdown-item" href="#" value="{{ $estat->id }}">{{ $estat->estat }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="dropdown-center">
            <button class="btn btn-outline-primary button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class='btn_content'>Tipus<span class="arrow"></span></div>
            </button>
            <ul class="dropdown-menu">
                @foreach ($tipusIncidents as $tipusIncident)
                    <li><a class="dropdown-item" href="#"
                            value="{{ $tipusIncident->id }}">{{ $tipusIncident->nom }}</a></li>
                @endforeach
            </ul>
        </div>
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
                    <a class="nav-link"
                        href="{{ action([App\Http\Controllers\InfoExpedientController::class, 'show'], ['infoExpedient' => $expedient->id]) }}">
                        <div class='top-expedient'>
                            <div class='data'>
                                @foreach ($datesUq as $item)
                                    {{$item}}
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
                                {{ $expedient->estatExpedient->estat }}<span class="dot" style="background-color: {{ $expedient->estatExpedient->color }};"></span>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach
        {{ $expedients->links() }}
    </div>
    
@endsection
