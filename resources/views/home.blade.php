@extends('layouts.dash')

@section('content')

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Lista de Colaboradores</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <i class="material-icons">person</i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" id="formsearch" action="JavaScript:search();" method="GET">
                    {{ csrf_field() }}
                    <div class="form-group form-search is-empty">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda">
                        <span class="material-input"></span>
                        <span class="material-input"></span><span class="material-input"></span></div>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="box-title">Facturas</h4>
                            <div class="margin" id="botones_control">
                                <a href="{{ url("carga") }}" class="btn btn-xs btn-primary">Actualizar</a>
                            <!--  <a href="{{ url("/listado_usuarios") }}"  class="btn btn-xs btn-primary" >Listado Usuarios</a>-->
                                <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Vacio</a>
                                <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Vacio</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active table-responsive">
                                    <table class="table table-hover table-striped" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Fecha Fac</th>
                                            <th>Factura</th>
                                            <th>Nombre</th>
                                            <th>Sucursal</th>
                                            <th>Estado</th>
                                            <th>Despacho</th>
                                            <th>Accion</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($es as $fact)
                                            <tr role="row" class="odd">
                                                <td> {{ $fact->Fecha}}</td>
                                                <td>{{ $fact->Factura }}</td>
                                                <td>{{ $fact->Nombre}}</td>
                                                <td>{{ $fact->sucursal->nombre}}</td>
                                                <td>{{ $fact->estado->DesEstado}}</td>
                                                <td>{{ $fact->despacho->estado}}</td>
                                                <td><a id="modal-672003"  href="/form_despacho/{{ $fact->Factura }}" data-target="#modal-container-829890" role="button" class="btn" data-toggle="modal">TeS</a></td>

                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $es->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
