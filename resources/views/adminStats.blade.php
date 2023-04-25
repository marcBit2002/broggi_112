@extends('layouts.admin_template', ['activeNav' => $activeNav])

@section('titulo')
    ESTADISTIQUES
@endsection

@section('contenido')
    <div id="adminCharts"></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection