

var SITEURL = "{{URL('/admin/product')}}";
$(function() {
    $(document).ready(function() {
        $('#errors').hide()
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
                console.log(xhr);
                

               window.location.href = "/admin/product"


            },
            error: function(xhr) {
                var percentVal = '0%';
                bar.width(percentVal)
                percent.html(percentVal);

                console.log("erro novo");
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
                }
                if (response.category_id) {
                    response.category_id.forEach(element => {
                    texto.push(element)
                });
                }
                if (response['image.0']) {
                    document.getElementById('file-1').value = "";
                    response['image.0'].forEach(element => {

                    texto.push("Uma das imagens tem mais de 700 Kb ou não é uma imagem")
                });
                }
                var codHMTLToPush = ""
                texto.forEach(element => {
                    codHMTLToPush  += "<li>"+element+"</li>"
                });

                console.log(codHMTLToPush);
                $('#errors').show();
                $('div.images').html('');
                $('#errors').append(codHMTLToPush);
                document.getElementById('errors').scrollIntoView();
                
            }
            
        });
    });
});



$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
               var fileSize = input.files[i].size;
                
                reader.onload = function(event) {
                    console.log(event);
                    console.log(event.total + "size");
                    if (event.total>=716800) {
                        $($.parseHTML('<img class="red-border col-sm-3">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    } else{
                    $($.parseHTML('<img class="col-sm-3">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }}

                reader.readAsDataURL(input.files[i]);
                        
                 }
        }

    };
 

    $('#file-1').on('change', function() {
        $('div.images').html('')
        imagesPreview(this, 'div.images');
    });
});