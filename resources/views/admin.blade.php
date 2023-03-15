@extends('layouts.admin_template')

@section('contenido')
<div class='title'>
    <h2 class="text-primary">USUARIS</h2>
</div>

    <div class='search'>
        <div class="input-group">
            <span class="input-group-text border border-primary border-3 border-end-0 text-warning">
                <i class="bi bi-search"></i>
            </span>
            <input type="search" class="form-control border border-3 border-start-0 border-primary" placeholder="Buscar" />
        </div>
    </div>

    <div class='table-content'>
    <table class="table table-hover bdr mt-4">
        <thead class="table border border-3 border-primary text-white">
            <th>Username</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Tipus</th>
            <th></th>
        </thead>
        <tbody>
            <tr class="border border-3 border-primary">
                <td>mariagarriga</td>
                <td>Maria</td>
                <td>Garriga</td>
                <td>Operador</td>
                <td><i class="bi bi-trash3 text-danger me-3"></i><i class="bi bi-pen text-danger"></i></td>
            </tr>
            <tr class="border border-3 border-primary">
                <td>marclazaro</td>
                <td>Marc</td>
                <td>Lázaro</td>
                <td>Operador</td>
                <td><i class="bi bi-trash3 text-danger me-3"></i><i class="bi bi-pen text-danger"></i></td>
            </tr>
            <tr class="border border-3 border-primary">
                <td>albamartinez</td>
                <td>Alba</td>
                <td>Martinez</td>
                <td>Supervisor</td>
                <td><i class="bi bi-trash3 text-danger me-3"></i><i class="bi bi-pen text-danger"></i></td>
            </tr>
            <tr class="border border-3 border-primary">
                <td>victorguillen</td>
                <td>Victor</td>
                <td>Guillén</td>
                <td>Operador</td>
                <td><i class="bi bi-trash3 text-danger me-3"></i><i class="bi bi-pen text-danger"></i></td>
            </tr>
            <tr class="border border-3 border-primary">
                <td>ffernandez</td>
                <td>Francisco</td>
                <td>Fernandez</td>
                <td>Supervisor</td>
                <td><i class="bi bi-trash3 text-danger me-3"></i><i class="bi bi-pen text-danger"></i></td>
            </tr>
        </tbody>
    </table>
</div>

    <div class='add-button'>
        <button class="btn btn-danger text-white"><i class="bi bi-plus-lg me-2"></i>Afegir usuari</button>
    </div>
@endsection
