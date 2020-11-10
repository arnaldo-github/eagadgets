@extends('layouts.single')
@section('title', 'Vista de Produto')
@section('title', $product->name)
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

                    <h2>Star Rating</h2>
                    <span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                    <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                    <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                    <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                    <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>

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
                        <a href="https://wa.me/{{$whatsappNumber}}?text={{$message . ' '. url()->full()}}" class="btn btn-primary">Mandar Mensagem por WhatsApp <i class="fab fa-whatsapp"></i></a> <br>
                        <a style="margin-top: 20px;" href="tel:{{$phoneNumber}}" class="btn btn-primary">Ligar <i class="fas fa-phone"></i></a>

                    </div>


                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card-body.// -->
</article>

<style>
    .checked {
        color: orange;
    }
    .blue{
        color: blue;
    }
</style>
</head>

<body>



    <script>
        paintStars({{$average}})
        function paintStars(sno){
            for (var i = 1; i <= sno; i++) {
                var cur = document.getElementById("star" + i)
                if (cur.className == "fa fa-star") {
                    cur.className = "fa fa-star checked"
                }
            }
        }

        function paintBlueStars(sno){
            for (var i = 1; i <= sno; i++) {
                var cur = document.getElementById("star" + i)
                if (cur.className == "fa fa-star") {
                    cur.className = "fa fa-star blue"
                }
            }
        }
        function add(ths, sno) {
            console.log(jQuery('meta[name="csrf-token"]').attr('content'));
            
            for (var i = 1; i <= 5; i++) {
                var cur = document.getElementById("star" + i)
                cur.className = "fa fa-star"
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
                console.log("come "+error.status);
                if (error.status == 401) {
                    window.location.href = "/login"
                }
            }
        });
            

        }
    </script>


    @endsection