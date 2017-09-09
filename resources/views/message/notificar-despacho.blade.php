<form method="post" action="/despachar" id="CONFIRMAR_DESPACHO">
    <div class="modal-header" >
        <h4 class="modal-title">Despacho</h4>
    </div>
        <div class="modal-body clearfix">
             <h3>¿ Deseas Anular Completamente el  libro  {{$f->Factura}} ?</h3>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="id_factura" value="{{$f->Factura}}">
            <button type="submit" class="btn btn-default">Despachar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar </button>

        </div>

    </form>