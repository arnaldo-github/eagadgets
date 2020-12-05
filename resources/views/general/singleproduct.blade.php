@extends('layouts.basic')
@section('title', 'Página do produto - '. $product->name)
@section('main')
@Include('components-structure.searchbar')

<div class="container" style=" margin-bottom: 30px;">

    <div class="row card main-card">
        <div class="  col s12 m12 l12 xl12">
            <div class="carousel">
                <h4 class="center">{{$product->name}}</h4>

                @foreach($product->photos as $photo)
                <a class="carousel-item" href="#one!"><img src="{{url($photo->path)}}"></a>
                @endforeach
            </div>
        </div>
        <div class="  col s12 m12 l4 xl5">
            <div style="margin-top: 30px;">
                <p class="center">
                <span class="material-icons" id="star1" onclick="add(this,1)">star</span>
                <span class="material-icons" id="star2" onclick="add(this,2)">star</span>
                <span class="material-icons" id="star3" onclick="add(this,3)">star</span>
                <span class="material-icons" id="star4" onclick="add(this,4)">star</span>
                <span class="material-icons" id="star5" onclick="add(this,5)">star</span>
            </p>
                <h3 class="center" style=" font-size: 25px;font-weight: 800;">{{$product->name}}</h3>
                <h5 class="center" style="@if(isset($product->sale) && $product->sale > 0)text-decoration: line-through; @endif font-size: 20px;font-weight: 700;">


                    {{$product->price}} MT @if(isset($product->sale) && $product->sale > 0)<span>antes</span> @endif</h5>
          @if(isset($product->sale) && $product->sale > 0)      <h5 class="center red-text" style=" font-size: 20px;font-weight: 700;">
                    {{$product->sale}} MT <small>(agora)</small></h5> @endif
                <p id="whatsAppButton"class="center" class="center"><a
                href="https://wa.me/{{setting('whatsappNumber')}}?text={{$message . ' '. url()->full()}}"
                style="background-color:  rgb(83, 200, 243) !important;width: 80%; height: 100%; padding-top: 10px; padding-bottom: 10px;" class="btn black">Mandar Mensagem <span class="flaticon-whatsapp"> </span> </a> <br>
                </p>
                <p id="callButton" style="margin-top: 10px;" class="center"><a  href="tel:{{setting('phoneNumber')}}" style="background-color:  rgb(83, 200, 243) ;width: 80%; height: 100%; padding-top: 10px; padding-bottom: 10px;" class="btn black">Ligar <span class="flaticon-phone-call"></span>
</a> <br>
                </p>
            </div>
        </div>
        <div class="  col s12 m12 l8 xl7">
            <div style="margin-top: 40px;">
                <H6 class="center" style="font-weight: 700;">Descrição do produto</H6>
                {!!$product->description!!}
            </div>
        </div>
    </div>

    <div class="row card">
        <div class="col s12 m12 l12 xl12">
        <h5>Outros produtos</h5>
        </div>
    @foreach($productSugestions as $product)
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

@Include('components-structure.marketing')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, {
                numVisible: 3,
                indicators: true
            });
        });
    </script>
     <script>
         $( document ).ready(function() {
            $( "#whatsAppButton" ).click(function() {
            
                fbq('track', 'AddToCart');
            });

            $( "#callButton" ).click(function() {
              
                fbq('track', 'Purchase', {value: 0.00, currency: 'USD', product: '{{$product->name}}'});
            });
        });
        
        paintStars({{$average}})
        function paintStars(sno){
            for (var i = 1; i <= sno; i++) {
                var cur = document.getElementById("star" + i)
                if (cur.className == "material-icons") {
                    cur.className = "material-icons painted"
                }
            }
        }

        function paintBlueStars(sno){
            for (var i = 1; i <= sno; i++) {
                var cur = document.getElementById("star" + i)
                if (cur.className == "material-icons") {
                    cur.className = "material-icons painted"
                }
            }
        }
        function add(ths, sno) {
            fbq('track', 'Lead');
            for (var i = 1; i <= 5; i++) {
                var cur = document.getElementById("star" + i)
                cur.className = "material-icons"
            }
          
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
            review: sno,
            product_id: {{$product->id}},
        };
        var type = "POST";
        var ajaxurl = "/review/add";
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                paintBlueStars(sno)
                console.log(data);
            },
            error: function (error) {
                console.log(error);
                paintStars({{$average}})
                console.log("come "+error.status);
                if (error.status == 401) {
                    window.location.href = "/login"
                }
            }
        });
            
    }
        
    </script>
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