@extends('layouts.admin')
@section('title', 'Lista de categorias incluindo as apagadas')

@section('main')
<h3>Lista de categorias incluindo as apagadas</h3>
<div class="col-sm-12">
    @if (session('activity'))
    <div class="alert alert-success">
        {{ session('activity') }}
    </div>
    @endif
</div>

<table class="table table-hover table-responsive">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Description</th>
            
        </tr>
    </thead>
    <tbody>

        @foreach ($categories as $category)
        <tr @if($category->trashed())  class="bg-danger"' @endif>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            
        </tr>
        @endforeach

    </tbody>
</table>
@endsection