<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('img/logo.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('pageTitle') - RRHH</title>

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
        <div class="sidebar" data-color="blue" data-image="{{asset('img/sidebar-4.jpg') }}"> <!--DIV DE BARRA LATERAL-->
            <div class="logo"> <!--DIV PARA ACOMODAR LOGO EN LATERAL-->
                <a href="{{ asset('home') }}"> <!--REDIRECCION A HOME-->
                    <img src="{{asset('img/logoalvia.png') }}" class="img-responsive" alt="">
                </a> <!--CIERRE DE REDIRECCION A HOME-->
            </div> <!--CIERRE DIV PARA ACOMODAR LOGO EN LATERAL-->

            <div class="sidebar-wrapper"> <!--DIV DE MENU LATERAL-->
                <ul class="nav"> <!--LISTA DESORDENADA-->
                    <li>
                        <a href="{{ asset('home') }}">
                            <i class="material-icons">home</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/catempleado') }}">
                            <i class="material-icons">people</i>
                            <p>Registrar Colaborador</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/list') }}">
                            <i class="material-icons">folder_shared</i>
                            <p>Lista de Colaboradores</p>
                        </a>
                    </li>
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
<script src="{{asset('js/material-dashboard.js')}}"></script>



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

<script>

    function search() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        var _token = $("input[name=_token]").val();
        var busqueda = document.getElementById("busqueda").value;
        console.log(_token)
        console.log(busqueda)
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: '{!! url('/busqueda') !!}',
            cache: false,
            data: {busqueda:busqueda},
            success: function(res) {
                console.log(res)
                var tabla= '';
                for (i=0;i<res.nombre.length;i++){
                    tabla += '<tr role="row" class="odd">';
                    tabla += '<td align="center">'+res.nombre[i].id+'</td>';
                    tabla += '<td align="center">'+res.nombre[i].nombre+'</td>';
                    tabla += '<td align="center">'+res.nombre[i].cedula+'</td>';
                    tabla += '<td align="center">'+res.nombre[i].fechaingreso+'</td>';
                    tabla += '<td align="center">'+res.nombre[i].sucursal+'</td>';
                    tabla += '<td align="center">'+res.nombre[i].fechacumple+'</td>';
                    switch (res.nombre[i].estado){
                        case "Activo":
                            tabla += '<td><i class="material-icons btn-success">check</i></td>';
                            break;
                        case "Inactivo":
                            tabla += '<td><i class="material-icons btn-danger">close</i></td>';
                            break;
                    }
                    tabla += '<td class="td-actions text-center"> <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs"> <i class="material-icons">edit</i> </button> <button type="button" rel="tooltip" title="Inactivar" class="btn btn-danger btn-simple btn-xs"> <i class="material-icons">close</i> </button> </td>';
                }
                tabla += '</tr>';
                $('#tbusqueda').html(tabla)
            }
        });
    }
</script>

</body>
</html>
