@extends('layouts.admin')
@section('title', 'Lista de Produtos')

@section('main')

<h3>Lista de produtos</h3>

<div class="col-sm-12">
    @if (session('activity'))
    <div class="alert alert-success">
        {{ session('activity') }}
    </div>
    @endif
</div>
<div class="row" style="margin-bottom: 20px;">
    <div class="col-sm-5">
        <form action="{{url('/admin/product/search')}}" method="get">
            <div class="form-group">
                <select name="category" class="form-control" name="category" id="categories">
                    <option value="" selected>Selecione uma categoria</option>

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquise pelo nome" name="searchText">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
<table class="table table-hover table-responsive">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Categoria</th>
            <th scope="col">Preço</th>
            <th scope="col">Editar</th>
            <th scope="col">Apagar</th>
        </tr>
    </thead>
    <tbody>
        @if(count($products)<=0)
            <h5>Sem resultados para demonstrar</h5>
        @endif
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td><a href="/admin/product/{{$product->id}}">{{$product->name}}</a></td>
            <td><a href="/admin/category">{{$product->category->name}}</a></td>
            <td>{{$product->price}}</td>
            <td><a href="/admin/product/{{$product->id}}/edit"><i class="fas fa-edit"></i></a></td>
            <td>
                <form action="{{route('product.destroy', $product->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<style>
    .active-pink-2 input.form-control[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #f48fb1;
        box-shadow: 0 1px 0 0 #f48fb1;
    }

    .active-pink input.form-control[type=text] {
        border-bottom: 1px solid #f48fb1;
        box-shadow: 0 1px 0 0 #f48fb1;
    }

    .active-purple-2 input.form-control[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #ce93d8;
        box-shadow: 0 1px 0 0 #ce93d8;
    }

    .active-purple input.form-control[type=text] {
        border-bottom: 1px solid #ce93d8;
        box-shadow: 0 1px 0 0 #ce93d8;
    }

    .active-cyan-2 input.form-control[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #4dd0e1;
        box-shadow: 0 1px 0 0 #4dd0e1;
    }

    .active-cyan input.form-control[type=text] {
        border-bottom: 1px solid #4dd0e1;
        box-shadow: 0 1px 0 0 #4dd0e1;
    }

    .active-cyan .fa,
    .active-cyan-2 .fa {
        color: #4dd0e1;
    }

    .active-purple .fa,
    .active-purple-2 .fa {
        color: #ce93d8;
    }

    .active-pink .fa,
    .active-pink-2 .fa {
        color: #f48fb1;
    }
</style>
{{ $products->links() }}
@endsection