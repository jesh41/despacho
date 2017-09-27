@extends('layouts.dash')
@section('pageTitle','ROLES')
@section('content')
    <nav class="navbar navbar-transparent navbar-absolute"> <!-- Barra de navegación con funciones de menu -->
        <div class="container-fluid"> <!--Contenedor ajustado de la Navbar-->
            <div class="navbar-header"> <!--Barra de Navegacion Responsive Izquierda-->
                <button type="button" class="navbar-toggle" data-toggle="collapse"> <!--Boton para descubrir la sidebar-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> <!--Cierre de Boton para descubrir la sidebar-->
                <a class="navbar-brand">ADMINISTRACION DE USUARIOS</a>
            </div> <!-- Cierre de Barra de Navegacion Responsive Izquierda-->

            <div class="collapse navbar-collapse"> <!--Menu para cierre de sesión-->
                <ul class="nav navbar-nav navbar-right"> <!--Lista para agregar mas opciones en dropdown-->
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
                </ul><!-- Cierre Lista para agregar mas opciones en dropdown-->
            </div> <!--Cierre de Menu para cierre de sesión-->

        </div> <!--Cierre de Contenedor ajustado de la Navbar-->

    </nav> <!--Cierre de Barra de navegación con funciones de menu-->

    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">PANEL DE USUARIOS</h4>
                        <div class="tab-content">
                            <div class="tab-pane active table-responsive">
                                <table class="table table-hover table-striped" cellspacing="0" width="100%">

             <thead role="row" class="odd">
            <tr>    <th>Codigo</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($U as $usuario)
                <tr role="row" class="odd">
                    <td>{{ $usuario->id }}</td>
                    <td><span class="label label-warning">
             @foreach($usuario->getRoleNames() as $roles)
                                {{  $roles }}
              @endforeach
                        </span>
                    </td>
                    <td class="mailbox-messages mailbox-name"><a href="javascript:void(0);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $usuario->name  }}</a></td>
                    <td>
                        {{ $usuario->email }}
                    </td>
                    <td>

                        <button type="button" class="btn  btn-default btn-xs"  ><i class="fa fa-fw fa-edit"></i></button>
                        <button type="button"  class="btn  btn-danger btn-xs"  ><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">ASIGNAR ROL</h4>
                    <form  method="post" action="/Asignar" id="formulario_rol_asig">
                        <div class="form-group label-floating">
                            <label class="control-label">Usuario</label>
                            <select class="form-control" id="usuario" name="usuario" required>
                                <option selected></option>
                                @foreach($U as $usuario)
                                    <option value={{$usuario->id}}>{{$usuario->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Rol</label>
                            <select class="form-control" id="rol" name="rol" required>
                                <option selected></option>
                                @foreach($R as $rol)
                                    <option value={{$rol->name}}>{{$rol->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Asignar</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">remove</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">QUITAR ROL</h4>
                    <form  method="post" action="/quitar" id="formulario_rol_quit">
                        <div class="form-group label-floating">
                            <label class="control-label">Usuario</label>
                            <select class="form-control" id="usuario" name="usuario" required>
                                <option selected></option>
                                @foreach($U as $usuario)
                                    <option value={{$usuario->id}}>{{$usuario->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Rol</label>
                            <select class="form-control" id="rol" name="rol" required>
                                <option selected></option>
                                @foreach($R as $rol)
                                    <option value={{$rol->name}}>{{$rol->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button type="submit" class="btn btn-primary btn-sm">quitar</button>
                    </form>
                </div>
            </div>
        </div>




    </div>
    </div>




@endsection
