@extends('layouts.admin')
@section('title', 'Vista de Produto')

@section('main')
<article class="card">
    <div class="card-body">
        <div class="row">
            <aside class="col-md-6">
                <article class="gallery-wrap">
                    <div class="card img-big-wrap">
                        <a href="#"> <img src="{{asset($product->photo_path)}}"></a>
                    </div> <!-- card img-big-wrap.// -->

                </article> <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-md-6">
                <article>
                    <a href="#" class="text-primary btn-link">{{$product->category->name}}</a>
                    <h3 class="title">{{$product->name}}</h3>
                    <hr>

                    <div class="mb-3">
                        <h6>Descrição:</h6>
                        <div>
                            {!!$product->description!!}
                        </div>
                    </div>



                    <div class="mb-3">
                        <var class="price h4">MTN{{$product->price}}</var> <br>

                    </div> <!-- price-detail-wrap .// -->

                    <div class="mb-4">
                        <a href="/admin/product/{{$product->id}}/edit" class="btn btn-primary">Editar produto</a>
                        <form action="{{route('product.destroy', $product->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button style="margin-top: 20px;" class="btn btn-primary" type="submit"><i class="fas fa-trash"></i> Apagar produto</button>
                        </form>
                    </div>


                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card-body.// -->
</article>

@endsection