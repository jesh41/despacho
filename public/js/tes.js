
test={
    showSwal: function(type,factura,token) {
        if (type == 'basic') {
            swal({
                title: "Here's a message!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            });

        } else if (type == 'title-and-text') {
            swal({
                title: "Here's a message!",
                text: "It's pretty, isn't it?",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-info"
            });

        } else if (type == 'success-message') {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                type: "success"
            });

        } else if (type == 'warning-message-and-confirmation') {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!',
                buttonsStyling: false
            }).then(function() {
                swal({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false

                })
            });
        } else if (type == 'warning-message-and-cancel') {
            swal({
                title: 'Desea despachar la factura '+ factura+ '?',
                html: '<form method="post" action="/despachar" id="CONFIRMAR_DESPACHO">' +
                '<input type="hidden" name="_token"  value='+token+'>' +
                '<input type="hidden" name="id_factura" value='+factura+'>'+'<button type="submit" class="btn btn-success">Despachar</button>'+
                '</form>',
                type: 'warning',
                showCancelButton: true,
                showConfirmButton: false,
                allowOutsideClick:false,
                allowEscapeKey:false,
                allowEnterKey:false,
               // confirmButtonText: 'Si',
               // cancelButtonText: 'No',
               // confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: false
            });
                   // title: 'Despachada !',
                   // html: '<form method="post" action="/despachar" id="CONFIRMAR_DESPACHO">' +
                  //      '<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">' +
                    //    '<input type="hidden" name="id_factura" value='+factura+'>'+'<button type="submit" class="btn btn-successt">Despachar</button>'+
                      //  '</form>',
              //      type: 'success',
                //    confirmButtonClass: "btn btn-success",
                  //  buttonsStyling: false
                    //location:'/form_despacho/'+factura
                    // url:'/form_despacho/factura'
        } else if (type == 'custom-html') {
            swal({
                title: 'HTML example',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                html: 'You can use <b>bold text</b>, ' +
                '<a href="http://github.com">links</a> ' +
                'and other HTML tags'
            });

        } else if (type == 'auto-close') {
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            });
        } else if (type == 'input-field') {
            swal({
                title: 'Input something',
                html: '<div class="form-group">' +
                '<input id="input-field" type="text" class="form-control" />' +
                '</div>',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                swal({
                    type: 'success',
                    html: 'You entered: <strong>' +
                    $('#input-field').val() +
                    '</strong>',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false

                })
            }).catch(swal.noop)
        }
    }
}
