@extends('layouts.admin')

@section('title', 'Editar Produto')

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
            <h3>Editar Produto</h3>
            <form action="{{route('product.update', $product->id)}}" id="formProductCreation" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" maxlength="255" value="{{$product->name}}" required class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="name">Preço do produto</label>
                    <input type="number" step=".01" min="0" value="{{$product->price}}" required class="form-control" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="sale">Desconto do produto (novo preço)</label>
                    <input type="number" step=".01" min="0" value="{{$product->sale}}" required class="form-control" name="sale" id="sale">
                </div>


                <div class="form-group">
                    <label for="category_id">Categoria do producto</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option @if($category->id == $product->category->id) {{'selected'}} @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


             

                <div>
                    <b>Descrição (copie o texto abaixo para o editor, se quiser editar. Se deixar o editor vazio, a descrição não vai ser alterada)</b>
                    <div>
                        {!!$product->description!!}
                    </div>
                </div>

                <div class="form-group" style="margin-top: 30px;">
                    <h6 for="name">Descrição do produto</h6>
                    <div id="editor"></div>
                    <span class="red-text" id="descriptionErrorMessage">É necessário escrever uma descrição mais longa</span>
                </div>
                <div>
                    
                </div>
                <input type="hidden" name="description" id="description">
                <button type="submit" class="btn btn-primary">Editar Produto</button>
            </form>
        </div>
    </div>
</div>

<style>
    .red-text {
        color: #d3394c;
    }

    button,
    input {
        display: none;
        overflow: visible;
    }
</style>

<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    })
    $(document).ready(function() {

        $('#descriptionErrorMessage').hide()
        $('#description').val('{{$product->description}}');
       
        
        
        $('#formProductCreation').submit((e) => {
            var html = quill.root.innerHTML;

            // console.log($('#file-1').files.length);
            
            if (html.length<11) {
                $('#descriptionErrorMessage').show()
              e.preventDefault()
            } else {
                $('#descriptionErrorMessage').hide()
            }
            $('#description').val(html)
        })
    });


  
</script>
@endsection