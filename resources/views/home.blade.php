@extends('layouts.dash')
@section('pageTitle','Facturas Pendientes')
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
                <a class="navbar-brand" href="#">LISTADO DE FACTURAS PENDIENTE DE DESPACHO</a>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <i class="material-icons">person</i>
                        </a>
                        <ul class="dropdown-menu navbar-danger" role="menu">
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
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red" >
                            <a href="{{ url("carga") }}" ><h5><i class="material-icons">refresh</i>Actualizar Facturas</h5></a>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active table-responsive">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Factura</th>
                                            <th class="text-center">Fecha</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Sucursal</th>
                                            <th class="text-center">Despachar</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbusqueda">
                                        @if(!empty($es))
                                        @foreach($es as $fact)

                                            <tr role="row" class="odd">
                                                <td align="center">{{ $fact->Factura }}</td>
                                                <td align="center">{{  Carbon\Carbon::parse($fact->Fecha)->format('d-M-y g:i A')}}</td>
                                                <td align="center">{{ $fact->Nombre}}</td>
                                                <td align="center">{{ $fact->sucursal->nombre}}</td>
                                                <td align="center">
                                                    <button class="btn btn-danger btn-fill btn-sm select"
                                                       onclick="test.showSwal('desp','{{ $fact->Factura }}','<?php echo csrf_token(); ?>')"> <i class="material-icons">check_box</i>
                                                    </button>
                                                </td>
                                            </tr>

                                        @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
