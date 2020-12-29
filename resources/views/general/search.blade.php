@extends('layouts.basic')
@section('title', 'Pesquisa de produtos')
@section('main')
@Include('components-structure.searchbar')

<div class="container">
    <div class="row">
        
        @if(count($products)<=0) 
        <h5>Não há resultados por mostrar para '{{Request::get("searchText")}}'
            @if(isset($category->name))
                na categoria {{$category->name}}
            @endif
            </h5>
            @endif
    </div>
</div>

<div class="container">
    @if(count($products)>0)
    <h4 class="center">Resultados para '{{Request::get("searchText")}}'     @if(isset($category->name))
                na categoria {{$category->name}}
            @endif </h4
    
    @endif>
    <div class="row">
        @foreach($products as $product)
        <div class="col product-row s12 m6 l4 xl4 ">
            <a href="{{url('/product/'.$product->id)}}">
                <div class="card product-card">
                    <a href="{{url('/product/'.$product->id)}}">
                        <img class="responsive-img" src="{{url($product->photos->first()->path)}}" alt="" srcset="">
                    </a>
                    <p style="text-transform: uppercase; font-weight: 700; text-decoration: underline;">
                        <a class="black-text product-link" href="{{url('/product/'.$product->id)}}">
                            {{$product->name}}
                        </a>

                    </p>
                    <p>
						@if(isset($product->sale) && $product->sale > 0)
					<span class="right red darken-1 white-text" style="font-size: 12px; font-weight: 500; width: fit-content; padding: 5px;">SALE</span>

					@endif

							@if(isset($product->sale) && $product->sale > 0)<span class="red-text">(antes){{$product->sale}}</span> @endif
						<span @if(isset($product->sale) && $product->sale > 0) style="text-decoration: line-through;" @endif >{{$product->price}}</span>
					</p>
				</div>

        </div>
        @endforeach
    </div>
    <div id="links">
        {{$products->links()}}
    </div>

</div>

@Include('components-structure.marketing')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.carousel');
        var instances = M.Carousel.init(elems, {
            numVisible: 1,
            indicators: true
        });
    });
</script>
</div>

@endsection