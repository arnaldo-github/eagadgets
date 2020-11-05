@extends('layouts.admin')

@section('title', 'Criar categoria')

@section('main')


<style>
    @media only screen and (min-width: 1000px) {
        .min-width-main-card {
            min-width: 50%;
        }
    }

    @media only screen and (max-width: 999px) {
        .min-width-main-card {
            min-width: 70%;
        }
    }

    @media only screen and (max-width: 599px) {
        .min-width-main-card {
            max-width: 80%;
        }
    }

    @media only screen and (max-width: 199px) {
        .min-width-main-card {
            min-width: 100%;
        }
    }
</style>



<div class="card min-width-main-card">
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <div class="">
            <h3>Criar Categoria</h3>
            <form action="{{url('/admin/category')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome da categoria</label>
                    <input type="text" maxlength="255" value="{{old('name')}}" required class="form-control" name="name" id="name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="descripion">Descrição da categoria</label>
                    <input type="text" value="{{old('description')}}" require maxlength="255" class="form-control" name="description" id="description" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Criar categoria</button>
            </form>
        </div>
    </div>
</div>
@endsection