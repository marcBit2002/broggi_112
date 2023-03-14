@extends('layouts.admin_template')

@section('contenido')
<h2 class="text-primary">USUARIS</h2>

{{-- <div class="input-group" style="width: 200px;">
    <span class="input-group-text border border-primary border-3 border-end-0 text-warning"><h4><i class="bi bi-search"></i></h4></span>
    <input type="search" class="form-control border border-3 border-start-0 border-primary" placeholder="Buscar" />
</div> --}}

<table class="mt-4">
    <tr>
        <th>Company</th>
        <th>Contact</th>
        <th>Country</th>
    </tr>
    <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
    </tr>
    <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
    </tr>
</table>
@endsection