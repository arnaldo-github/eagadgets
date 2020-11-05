@extends('layouts.single')

@section('main')
<div class="row">
    <h3>{{$category->name}}</h3>
</div>
    <div class="row">
    @foreach($products as $product)
	<div class="col-md-3">
			<div href="#" class="card card-product-grid">
				<a href="/product/{{$product->id}}" class="img-wrap"> <img src="{{url(''.$product->photo_path)}}"> </a>
				<figcaption class="info-wrap">
					<a href="/product/{{$product->id}}" class="title">{{$product->name}}</a>
					<div class="price mt-1">MTN {{$product->price}}</div> <!-- price-wrap.// -->
				</figcaption>
			</div>
		</div>
    @endforeach
    <div class="col-sm-12">
        {{$products->links()}}
    </div>
    </div>
@endsection