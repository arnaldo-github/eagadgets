<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.0.0.min.js" integrity="sha256-1IKHGl6UjLSIT6CXLqmKgavKBXtr0/jJlaGMEkh+dhw=" crossorigin="anonymous"></script>

    <!-- Bootstrap4 files-->
    <script src="/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" />

    <!-- custom style -->
    <link href="/css/ui.css" rel="stylesheet" type="text/css" />
    <link href="/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <!-- custom javascript -->
    <script src="/js/script.js" type="text/javascript"></script>

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

        });
        // jquery end
    </script>

</head>

<body>

    <header class="section-header">

        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-4">
                        <a href="{{url('/')}}" class="brand-wrap">
                            <img class="logo" src="/images/logo.png">
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <form action="{{route('search.all.products')}}" class="search">
                            <div class="input-group w-100">
                                <input type="text" name="searchText" class="form-control" placeholder="{{$placeholder}}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    @if(Route::has('login'))
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header icontext">
                                @auth
                                <a href="/user/profile" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
                                @else
                                <div class="text">
                                    <div>
                                        <a href="/login">Login</a> |
                                        @if (Route::has('register'))
                                        <a href="/register"> Criar conta</a>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                    @endif
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->
    </header> <!-- section-header.// -->


    <nav class="navbar navbar-main navbar-expand-lg navbar-light">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> &nbsp Categorias</strong></a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                            <a class="dropdown-item" href="/category/{{$category->id}}">{{$category->name}}</a>
                            @endforeach


                        </div>
                    </li>

                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>

    </header> <!-- section-header.// -->









    <!-- ========================= SECTION  ========================= -->
    <section class="section-name  padding-y-sm">
        <div class="container">

            <header class="section-heading">
                <h3 class="section-title">Lista de produtos</h3>
            </header><!-- sect-heading -->


            <div class="row">
                @section('main')

                @show
            </div> <!-- row.// -->

        </div><!-- container // -->
    </section>
    <!-- ========================= SECTION  END// ========================= -->
    <!-- ========================= SECTION SPECIAL ========================= -->
    <section class="section-specials padding-y border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <figure class="itemside">
                        <div class="aside">
                            <span class="icon-sm rounded-circle bg-primary">
                                <i class="fa fa-money-bill-alt white"></i>
                            </span>
                        </div>
                        <figcaption class="info">
                            <h6 class="title">Reasonable prices</h6>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labor </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="itemside">
                        <div class="aside">
                            <span class="icon-sm rounded-circle bg-danger">
                                <i class="fa fa-comment-dots white"></i>
                            </span>
                        </div>
                        <figcaption class="info">
                            <h6 class="title">Customer support 24/7 </h6>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labor </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="itemside">
                        <div class="aside">
                            <span class="icon-sm rounded-circle bg-success">
                                <i class="fa fa-truck white"></i>
                            </span>
                        </div>
                        <figcaption class="info">
                            <h6 class="title">Quick delivery</h6>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labor </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
            </div> <!-- row.// -->

        </div> <!-- container.// -->
    </section>
    <!-- ========================= SECTION SPECIAL END// ========================= -->



    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer border-top">
        <div class="container">
            <section class="footer-top padding-y">
                <div class="row">
                    <aside class="col-md col-6">
                        <h6 class="title">Brands</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Adidas</a></li>
                            <li> <a href="#">Puma</a></li>
                            <li> <a href="#">Reebok</a></li>
                            <li> <a href="#">Nike</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Company</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">About us</a></li>
                            <li> <a href="#">Career</a></li>
                            <li> <a href="#">Find a store</a></li>
                            <li> <a href="#">Rules and terms</a></li>
                            <li> <a href="#">Sitemap</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Help</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Contact us</a></li>
                            <li> <a href="#">Money refund</a></li>
                            <li> <a href="#">Order status</a></li>
                            <li> <a href="#">Shipping info</a></li>
                            <li> <a href="#">Open dispute</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Account</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#"> User Login </a></li>
                            <li> <a href="#"> User register </a></li>
                            <li> <a href="#"> Account Setting </a></li>
                            <li> <a href="#"> My Orders </a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Social</h6>
                        <ul class="list-unstyled">
                            <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
                            <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
                            <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
                            <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
                        </ul>
                    </aside>
                </div> <!-- row.// -->
            </section> <!-- footer-top.// -->

            <section class="footer-bottom border-top row">
                <div class="col-md-2">
                    <p class="text-muted"> &copy 2019 Company name </p>
                </div>
                <div class="col-md-8 text-md-center">
                    <span class="px-2">info@pixsellz.io</span>
                    <span class="px-2">+879-332-9375</span>
                    <span class="px-2">Street name 123, Avanue abc</span>
                </div>
                <div class="col-md-2 text-md-right text-muted">
                    <i class="fab fa-lg fa-cc-visa"></i>
                    <i class="fab fa-lg fa-cc-paypal"></i>
                    <i class="fab fa-lg fa-cc-mastercard"></i>
                </div>
            </section>
        </div><!-- //container -->
    </footer>
    <!-- ========================= FOOTER END // ========================= -->

</body>

</html>