@extends('layouts.dash')
@section('pageTitle','ROLES')
@section('content')
    <div id="zona_etiquetas_roles" style="background-color:white;" >
        Roles asignados:
        @foreach($ra->getRoleNames() as $rl)
            <span class="label label-warning" style="margin-left:10px;">{{ $rl }} </span>
        @endforeach


    </div>
    <div class="box-body">
        <form  method="post" action="/Asignar" id="formulario_rol">
   <div class="col-md-6">
    <div class="form-group">
        <label class="col-sm-4 control-label">Usuario</label>
        <div class="col-sm-6">
            <select class="form-control" id="usuario" name="usuario" required>
                <option selected></option>
                @foreach($U as $usuario)
                    <option value={{$usuario->id}}>{{$usuario->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">Rol</label>
                <div class="col-sm-6">
                    <select class="form-control" id="rol" name="rol" required>
                        <option selected></option>
                        @foreach($R as $rol)
                            <option value={{$rol->name}}>{{$rol->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-4" >
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button type="submit" class="btn btn-primary">Asignar</button>
        </div>
        </form>
    </div>


@endsection
