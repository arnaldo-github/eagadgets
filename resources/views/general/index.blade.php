@extends('layouts.basic')
@section('title', 'EA Gadgets - Página Inicial')
@section('main')
@Include('components-structure.search-mobile')
@Include('components-structure.banner')

<div class="container" style="margin-top: 60px; margin-bottom: 30px;">

<h4 class="center">Categorias
  </h4>

  <div class="container" style="margin-top: 10px;">
    <div class="row">
	  @foreach($categories as $category)
	  
	  <div class="hoverable col s16 m6 l4 xl4">
        <a href="{{url('/category/'.$category->id)}}">
          <div class=" card-panel category">
            <span class="white-text">{{$category->name}}</span>
          </div>
        </a>
      </div>

	  @endforeach
    </div>
  </div>

	<h4 class="center"> Últimos Produtos</h4>
	<div class="row">

		@foreach($products as $product)
		<div class="col  s12 m6 l4 xl4 ">
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
					<p> @if(isset($product->sale) && $product->sale>0)<span class="red-text">{{$product->sale}}</span> @endif
						<span @if(isset($product->sale)  && $product->sale>0) style="text-decoration: line-through;" @endif >{{$product->price}}</span></p>

					@if(isset($product->sale) && $product->sale>0)
					<p class="red darken-1 white-text" style="font-size: 12px; font-weight: 500; width: fit-content; padding: 5px;">SALE</p>

					@endif
				</div>

		</div>
		@endforeach
	</div>
	<p class="center">
			<a class="btn btn-primary see-all" href="/product">ver todos os produtos</a>
	</p>

	<div class="row">
		<div class="col s12 m12 l4 xl4">
			<div class="card ">
				<div class="">
					<p class="center"><span style="font-size: 45px; margin-top: 15px;" class=" material-icons">
							money_off
						</span>
					</p>
					<h6 style="font-weight: 600;" class="center">Preços baixos</h6>
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p class="center">I am a very simple card. I al bits of information.</p>
					</div>

				</div>
			</div>
		</div>
		<div class="col s12 m12 l4 xl4">
			<div class="card ">
				<div class="">
					<p class="center"><span style="font-size: 45px; margin-top: 15px;" class=" material-icons">
							support_agent
						</span>
					</p>
					<h6 style="font-weight: 600;" class="center">Atendimento ao Cliente</h6>
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p class="center">I am a very simple card. I al bits of information.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12 m12 l4 xl4">
			<div class="card ">
				<div class="">
					<p class="center"><span style="font-size: 45px; margin-top: 15px;" class=" material-icons">
							local_shipping
						</span>
					</p>
					<h6 style="font-weight: 600;" class="center">Preços baixos</h6>
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p class="center">I am a very simple card. I al bits of information.</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection