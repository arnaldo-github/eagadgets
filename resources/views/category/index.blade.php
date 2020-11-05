@extends('layouts.admin')
@section('title', 'Lista de categorias')

@section('main')
<h3>Lista de categorias</h3>
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
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td><a href="/admin/category/{{$category->id}}/edit"><i class="fas fa-edit"></i></a></td>
            <td>
                <form action="{{route('category.destroy', $category->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection