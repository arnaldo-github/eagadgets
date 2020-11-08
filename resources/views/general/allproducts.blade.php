@extends('layouts.allproducts')

@section('title', 'Pesquisa de produtos')

@section('main')

	<div class="col-md-12">
		@if(count($products)<=0)
			<h5>Não há resultados por mostrar para '{{Request::get("searchText")}}' 

			@if(isset($category->name))
				na categoria {{$category->name}}
			@endif
			</h5>
		@endif
	</div>

	@foreach($products as $product)
	<div class="col-md-3">
			<div href="#" class="card card-product-grid">
				<a href="/product/{{$product->id}}" class="img-wrap"> <img src="{{''.url($product->photo_path)}}"> </a>
				<figcaption class="info-wrap">
					<a href="/product/{{$product->id}}" class="title">{{$product->name}}</a>
					<div class="price mt-1">MTN {{$product->price}}</div> <!-- price-wrap.// -->
				</figcaption>
			</div>
        </div>
        
        {{$products->links()}}
	@endforeach

@endsection