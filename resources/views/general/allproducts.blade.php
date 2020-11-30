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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v9.0" nonce="BAxxxEfF"></script>

<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', {{Illuminate\Support\Facades\Config::get('social.pixel')}}); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id={{Illuminate\Support\Facades\Config::get('social.pixel')}}&ev=PageView
&noscript=1"/>
</noscript>
@endsection