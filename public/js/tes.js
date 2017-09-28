$(document).on("submit",".formentrada",function(e){
    e.preventDefault();
    var quien=$(this).attr("id");
    var formu=$(this);
    var varurl="";
    if(quien=="CONFIRMAR_DESPACHO"){  var varurl=$(this).attr("action");  var div_resul="capa_formularios";  }//listo
    $("#"+div_resul+"").html( $("#cargador_empresa").html());
    $.ajax({
        // la URL para la petición
        url : varurl,
        data : formu.serialize(),
        type : 'POST',
        dataType : 'html',
        success : function(resul) {
            console.log(e);
            swal({
                title: "DESPACHADA!",
                text: "",
                timer: 1000,
                showConfirmButton: false
            }).catch(swal.noop);
        },
        error : function(xhr, status) {
            console.log(e);
            swal("Error deleting!", "Please try again", "error");
        }

    });

})




test={
    showSwal: function(type,factura,token) {
        if (type == 'basic') {
            swal({
                title: "Here's a message!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            });

        }  else if (type == 'warning-message-and-confirmation') {
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
        } else if (type == 'desp') {
            swal({
                title: 'Desea despachar la factura '+ factura+ '?',
                html: '<form method="post" action="/despachar" id="CONFIRMAR_DESPACHO" class="formentrada">' +
                '<input type="hidden" name="_token"  value='+token+'>' +
                '<input type="hidden" name="id_factura" value='+factura+'>'+'<button type="submit" class="btn btn-success remove">Despachar</button>'+
                '</form>',
                type: 'warning',
                showCancelButton: true,
                showConfirmButton: false,
                allowOutsideClick:false,
                allowEscapeKey:false,
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).catch(swal.noop);
        }
    }
}
