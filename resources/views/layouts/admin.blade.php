<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">


    <link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

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

    </header> <!-- section-header.// -->


    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> &nbsp Produtos</strong></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/product/create">Criar Produto</a>
                            <a class="dropdown-item" href="/admin/product/">Listar Produtos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> &nbsp Categoria</strong></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/category/create">Criar Categoria</a>
                            <a class="dropdown-item" href="/admin/category">Listar Categorias</a>
                            <a class="dropdown-item" href="/admin/category/list-all">Listar Todas Categorias</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> &nbsp Propriedades</strong></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/options">Alterar propriedades</a>
                            <a class="dropdown-item" href="/admin/options/hero-image">Alterar banner</a>
                        
                        </div>
                    </li>
                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>

    </header> <!-- section-header.// -->
    <div class="container">
      
            @section('main')
            
            
            @show

            
     
    </div>
    @section('result')
        
    @show
</body>

</html>