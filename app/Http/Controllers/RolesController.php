<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Auth;
use HasRoles;




class RolesController extends Controller
{


    public function index()
    {

        //$fa=Facturas::wheredate('Fecha', '=',Carbon::now()->format('Y-m-d'))->orderbyDesc('Fecha')->paginate(10);
        //$fa=Facturas::where('estado_id','=',1)->orderbyDesc('Fecha')->paginate(10);
        $user=User::all();
        $rol=Role::all();
        $usuario=User::find(Auth::user()->id);
        $roles = $usuario->getRoleNames();
        return view('roles.index')->with('U',$user)->with('R',$rol)->with('ra',$usuario);

    }

    public function asignarol(Request $request)
    {

        $usuario = User::find($request->input("usuario"));


        if($usuario->hasAnyRole(Role::all())){

            $notificacion = [
                'message' => 'USUARIO YA POSEE UN ROL',
                'alert-type' => 'warning',
            ];
        }
        else{
            $usuario->assignRole($request->input("rol"));
            $notificacion = [
                'message' => 'Rol Asignado',
                'alert-type' => 'success',
            ];
        }



        return back()->with($notificacion);
    }
    public function quitarol(Request $request)
    {

        $usuario = User::find($request->input("usuario"));
        if ($usuario->hasRole($request->input("rol"))){
            $usuario->removeRole($request->input("rol"));
            $notificacion = [
                'message' => 'Rol quitado',
                'alert-type' => 'success',
            ];
        }
        else {

            $notificacion = [
                'message' => 'NO POSEE ESE ROL',
                'alert-type' => 'warning',
            ];
        }
        return back()->with($notificacion);
    }


}
