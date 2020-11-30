@extends('layouts.basic')
@section('title', 'Página de produtos')
@section('main')
@Include('components-structure.searchbar')

<div class="container">
<div class="row">
		@if(count($products)<=0)
			<h5>Não há produtos por mostrar
			@if(isset($category->name))
				na categoria {{$category->name}}
			@endif
			</h5>
		@endif
	</div>
</div>

<div class="container">
	  <h4 class="center">Produtos</h4>
	  <div class="row">
	  @foreach($products as $product)
		<div class="col s12 m6 l4 xl4 ">
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

							@if(isset($product->sale) && $product->sale > 0)<span class="red-text">{{$product->sale}}</span> @endif
						<span @if(isset($product->sale) && $product->sale > 0) style="text-decoration: line-through;" @endif >(antes){{$product->price}}</span>
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

</div>

@endsection