<?php

namespace App\Http\Controllers;
use App\Models\Solicitudes;
use App\Models\User;
use App\Models\MenuCuentas;
use Illuminate\Http\Request;
use Mail;

class SolicitudesController extends Controller
{
    public function Solicitar_rol(){
        $user = auth()->user();
        $vericar_solicitud = Solicitudes::whereid_usuario($user->id)->exists();
        if ($vericar_solicitud!=true) { //SIN SOLICITUD ACTIVA
            $solicitud = new Solicitudes;
            $solicitud->id_usuario = $user->id;
            $solicitud->name = $user->name;
            $solicitud->email = $user->email;
            $solicitud->estatus = 0; //EN PROCESO
            $solicitud->save();
            $users = User::whererol_id(1)->get();
            foreach ($users as $admin) {
                $message=(new \App\Mail\Notificaciones());
                Mail::to($admin->email)->send($message);
            }
            $menu = MenuCuentas::whereIdUsuarioTipo($user->rol_id)->get();
            return view('home',compact('menu'));
        }else{//SOLICITUD ACTIVA O EXISTENTE
            $solicitud = Solicitudes::whereid_usuario($user->id)->first();
            switch ($solicitud->estatus) {
                case 0:// PROCESO
                    $menu = MenuCuentas::whereIdUsuarioTipo($user->rol_id)->get();
                    return view('home',compact('menu'));
                break;
                case 1:// ACEPTADO
                    $menu = MenuCuentas::whereIdUsuarioTipo($user->rol_id)->get();
                    return view('home',compact('menu'));
                break;
                case 2:// RECHAZADO
                    $cambiar_solicitud = Solicitudes::whereid($solicitud->id)->update([
                        'estatus'=>0, //PROCESO
                    ]); 
                    $users = User::whererol_id(1)->get();
                    foreach ($users as $admin) {
                        $message=(new \App\Mail\Notificaciones());
                        Mail::to($admin->email)->send($message);
                    }
                    $menu = MenuCuentas::whereIdUsuarioTipo($user->rol_id)->get();
                    return view('home',compact('menu'));
                break;
                
            }
        }
    }

    public function solicitudes(){
      $solicitudes = Solicitudes::whereestatus(0)->get();
      return view('solicitudes.solicitudes',compact('solicitudes'));
    }

    public function aceptar(Request $request){
        $aceptar_solicitud = Solicitudes::whereid($request->id)->update([
            'estatus'=>1, //ACEPTADO
        ]);
        $solicitud = Solicitudes::whereid($request->id)->first();
        
        $actualizar_solicitud = User::whereemail($solicitud->email)->update([
            'rol_id'=>1, //rol de admin
        ]);

        $message=(new \App\Mail\Notificaciones_Aceptar());
        Mail::to($solicitud->email)->send($message);

        $solicitudes = Solicitudes::whereestatus(0)->get();
        return view('solicitudes.solicitudes',compact('solicitudes'));
    }

    public function rechazar(Request $request){
        $aceptar_solicitud = Solicitudes::whereid($request->id)->update([
            'estatus'=>2, //RECHAZAR
        ]);

        $solicitud = Solicitudes::whereid($request->id)->first();

        $message=(new \App\Mail\Notificaciones_Rechazar());
        Mail::to($solicitud->email)->send($message);

        $solicitudes = Solicitudes::whereestatus(0)->get();
        return view('solicitudes.solicitudes',compact('solicitudes'));
    }
}
