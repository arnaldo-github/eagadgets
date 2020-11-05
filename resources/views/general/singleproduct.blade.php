@extends('layouts.single')
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
                        <a href="https://wa.me/{{$whatsappNumber}}?text={{$message . ' '. url()->full()}}"
                        class="btn btn-primary">Mandar Mensagem por WhatsApp <i class="fab fa-whatsapp"></i></a> <br>
                        <a style="margin-top: 20px;" href="tel:{{$phoneNumber}}" class="btn btn-primary" >Ligar <i class="fas fa-phone"></i></a>
                        
                    </div>


                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card-body.// -->
</article>

@endsection