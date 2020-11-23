@extends('layouts.admin')
@section('title', 'Vista de Produto')

@section('main')
<style>
    .carousel-img{
        max-width: 100%;
  height: auto;
    }
    .div-slide{
    height: 600px !important;
    }
</style>
<article class="card">
    <div class="card-body">
        <div class="row">
            <aside class="col-md-6">
                <article class="gallery-wrap">
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    
    <?php $x = 0; ?>
    @foreach($product->photos as $photo)
 
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$x}}"></li>
        <?php $x++; ?>
    @endforeach

  </ol>
  <div id="div-slide" class="carousel-inner">
  
    @foreach($product->photos as $photo)
    <div  class=" carousel-item">
      <img style="object-fit: cover !important;
                    width: 100% !important;
                    max-height: 700px !important;" class="d-block w-100 carousel-img " 
                    src="{{url($photo->path)}}" alt="First slide">
    </div>
    @endforeach
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


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
                    <div class="mb-3">
                        <var class="price h4">Desconto MTN{{$product->sale}}</var> <br>

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

<div class="container">

</div>
<script>
    $(document).ready(function() {
        $('#div-slide div:first-child').addClass('active')
        $('.carousel').carousel()
    })
</script>

@endsection