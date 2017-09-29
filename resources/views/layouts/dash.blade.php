<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('img/logo.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('pageTitle') - Despacho</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="_token" content="{!! csrf_token() !!}" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Material Dashboard CSS -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

    <!-- Fonts and icons -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="app">


    <div class="modal fade" id="modal-container-829890" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">


            </div>
        </div>

    </div>

    <div id="wrapper" class="active">
        <!-- Sidebar -->
        <div class="sidebar" data-active-color="blue" data-background-color="white"> <!--DIV DE BARRA LATERAL-->
            <div class="logo"> <!--DIV PARA ACOMODAR LOGO EN LATERAL-->
                <a href="{{ url('/') }}"> <!--REDIRECCION A HOME-->
                    <img src="{{asset('img/logoalvia.png') }}" class="img-responsive" alt="">
                </a> <!--CIERRE DE REDIRECCION A HOME-->
            </div> <!--CIERRE DIV PARA ACOMODAR LOGO EN LATERAL-->

            <div class="sidebar-wrapper"> <!--DIV DE MENU LATERAL-->
                <ul class="nav"> <!--LISTA DESORDENADA-->
                    <li>
                        <a href="{{ url('/') }}">
                            <i class="material-icons">assignment</i>
                            <p>Facturas Pendientes</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/historial') }}">
                            <i class="material-icons">library_books</i>
                            <p>Facturas Despachadas</p>
                        </a>
                    </li>
                    @role('Administrator')
                    <li>
                        <a href="{{ url('/roles') }}">
                            <i class="material-icons">people</i>
                            <p>Roles</p>
                        </a>
                    </li>
                    @endrole
                </ul> <!--CIERRE DE LISTA DESORDENADA-->
            </div> <!--CIERRE DE DIV DE MENU LATERAL-->
        </div> <!--CIERRE DE DIV DE BARRA LATERAL-->
    </div>

    <div class="main-panel"> <!--Panel Central-->
    @yield('content') <!--Llamado a la Vista Lista y Agregar, segun click en Anchor-->
        <footer class="footer ">
            <div class="container-fluid">
                <p class="copyright text-center">
                    &copy; <script>document.write(new Date().getFullYear())</script>
                    Powered By IT
                    <a href="http://alviacomercial.com">
                        Alvia Comercial
                    </a>
                </p>
            </div>
        </footer>
    </div><!--Cierre de Panel Central-->
</div>


<!--   Core JS Files   -->
<script src="{{asset('js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/material-dashboard.js')}}"></script>
<script src="{{asset('js/jquery.datatables.js')}}"></script>
<script src="{{asset('js/tes.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5,10, 25, 50, -1],
                [5,10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "BUSQUEDA",
                lengthMenu: "Mostrar _MENU_ facturas por pagina",
                zeroRecords: "NO EXISTE EL REGISTRO SOLICITADO",
                info: "pagina _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros",
                infoFiltered: "(filtrado de _MAX_ total facturas)",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Ultimo"
                }
            }

        });
        var table = $('#datatables').DataTable();
        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });
        //ernestp
        table.on('click', '.select', function(e) {
            $tr = $(this).closest('tr');
            //console.log($tr);
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label .pagination').addClass('form-group');
    });
</script>

<script src="{{ asset('js/toastr.js') }}"></script>
<script>
            @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<script>
    $('.datepicker').datetimepicker({
        format: 'MM/DD/YYYY',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove',
            inline: true
        }
    });
</script>



</body>
</html>
