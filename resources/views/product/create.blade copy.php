@extends('layouts.admin')

@section('title', 'Criar Produto')

@section('main')
<style>
    .progress {
        position: relative;
        width: 100%;
    }

    .bar {
        background-color: #00ff00;
        width: 0%;
        height: 20px;
    }

    .percent {
        position: absolute;
        display: inline-block;
        left: 50%;
        color: #040608;
    }
</style>

<style>
    @media only screen and (min-width: 1000px) {
        .min-width-main-card {
            min-width: 50%;
        }
    }

    @media only screen and (max-width: 999px) {
        .min-width-main-card {
            min-width: 70%;
        }
    }

    @media only screen and (max-width: 599px) {
        .min-width-main-card {
            max-width: 80%;
        }
    }

    @media only screen and (max-width: 199px) {
        .min-width-main-card {
            min-width: 100%;
        }
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<div class="card min-width-main-card">
    <div class="card-body">

        
        <div id="errors" class="alert alert-danger">
          
        </div>
   

        <div class="">
            <h3>Criar Produto</h3>
            <form action="{{url('/admin/product')}}" id="formProductCreation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" maxlength="255" value="{{old('name')}}" required class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="name">Preço do produto</label>
                    <input type="number" step=".01" min="0" value="{{old('price')}}" required class="form-control" name="price" id="price">
                </div>


                <div class="form-group">
                    <label for="category_id">Categoria do producto</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="inpu-group">

                    <div class="box">
                        <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" /></svg> <span>Escolha uma foto&hellip;</span></label>
                    </div>
                    <span class="red-text" id="fileErrorMessage">Escolha uma foto é obrigatório</span>
                </div>


                <div class="form-group" style="margin-top: 30px;">
                    <h6 for="name">Descrição do produto</h6>
                    <div id="editor"></div>
                    <span class="red-text" id="descriptionErrorMessage">É necessário escrever uma descrição mais longa</span>
                </div>
                <input type="hidden" name="description" id="description">
                <div class="progress">
                    <div class="bar"></div>
                    <div class="percent">0%</div>
                </div>
                <button type="submit" class="btn btn-primary">Criar Produto</button>
            </form>
        </div>
    </div>
</div>



<style>
    .red-text {
        color: #d3394c;
    }

    button,
    input {
        display: none;
        overflow: visible;
    }

    .js .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .inputfile+label {
        max-width: 80%;
        font-size: 1.25rem;
        /* 20px */
        font-weight: 700;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        padding: 0.625rem 1.25rem;
        /* 10px 20px */
    }

    .no-js .inputfile+label {
        display: none;
    }

    .inputfile:focus+label,
    .inputfile.has-focus+label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }


    .inputfile+label svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
        margin-top: -0.25em;
        /* 4px */
        margin-right: 0.25em;
        /* 4px */
    }


    /* style 1 */

    .inputfile-1+label {
        color: #f1e5e6;
        background-color: #d3394c;
    }

    .inputfile-1:focus+label,
    .inputfile-1.has-focus+label,
    .inputfile-1+label:hover {
        background-color: #722040;
    }
</style>
<script type="text/javascript">
    var SITEURL = "{{URL('/admin/product')}}";
    $(function() {
        $(document).ready(function() {
            var bar = $('.bar');
            var percent = $('.percent');

            $('form').ajaxForm({
                dataType: 'json',
                beforeSend: function(xhr) {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },

                success: function(xhr) {

                   window.location.href = "/admin/product"


                },
                error: function(xhr) {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);

                    console.log("erro");
                    console.log(xhr);

                    var texto = new Array();
                    var response = xhr.responseJSON;
                    if (response.name) {
                        response.name.forEach(element => {
                            texto.push(element)
                        });
                    }
                    if (response.description) {
                        response.description.forEach(element => {
                        texto.push(element)
                    });
                    }
                    if (response.price) {
                        response.price.forEach(element => {
                        texto.push(element)
                    });
                    if (response.category_id) {
                        response.category_id.forEach(element => {
                        texto.push(element)
                    });
                    }
                    if (response.image) {
                        response.image.forEach(element => {
                        texto.push(element)
                    });
                    }
                    alert(texto)
                    var codHMTLToPush = ""
                    texto.forEach(element => {
                        codHMTLToPush  += "<li>"+element+"</li>"
                    });
                    $('#errors').append(codHMTLToPush);
                }
                }
            });
        });
    });
</script>

<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    })
    $(document).ready(function() {
        $('#fileErrorMessage').hide();
        $('#descriptionErrorMessage').hide()
        $('#formProductCreation').submit((e) => {
            var html = quill.root.innerHTML;

            // console.log($('#file-1').files.length);
            if (document.getElementById("file-1").files.length == 0) {
                $('#fileErrorMessage').show();
                e.preventDefault()
            } else {
                $('#fileErrorMessage').hide();
            }
            if (html.length <= 13) {
                $('#descriptionErrorMessage').show()
                e.preventDefault()

            } else {
                $('#descriptionErrorMessage').hide()
            }
            $('#description').val(html)
        })
    });


    ;
    (function($, window, document, undefined) {
        $('.inputfile').each(function() {
            var $input = $(this),
                $label = $input.next('label'),
                labelVal = $label.html();

            $input.on('change', function(e) {
                var fileName = '';

                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                else if (e.target.value)
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    $label.find('span').html(fileName);
                else
                    $label.html(labelVal);
            });

            // Firefox bug fix
            $input
                .on('focus', function() {
                    $input.addClass('has-focus');
                })
                .on('blur', function() {
                    $input.removeClass('has-focus');
                });
        });
    })(jQuery, window, document);
</script>
@endsection