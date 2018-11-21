<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emergency;
use App\District;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class EmergencyController extends Controller
{
    public function listEmergency()
    {
        $sede= Auth::user()->sede;
        $cod= Auth::user()->codid;
        $emergency = Emergency::Emergencys($cod);
        $district = District::where('province_id', $sede)->get();
        return view('emergency.index', compact('emergency','district'));
    }

    public function editEmergency(Request $request){
        $id_evals= $request->input("idval");
        $emergency = Emergency::find($id_evals);
        return response()->json(
            $emergency->toArray()
            );
    }

    public function updateEmergency(Request $request){
        $archivo= $request->file('img_ref');


        $pk= $request->input("pk_emergency");
        $type_form= $request->input("type_form");

        $date= $request->input("date");
        $district= $request->input("district");
        $tittle= $request->input("tittle");
        $action= $request->input("action");
        $description= $request->input("description");
        $fuente= $request->input("name");
        $cargo= $request->input("cargo");
        $phone= $request->input("phone");
        $latitud= $request->input("lt");
        $longuitud= $request->input("lg");
        $ico= $request->input("ico");

        

        $pid= Auth::user()->codid;

        if ($type_form=="edit") {

            $e_update = Emergency::find($pk);
            if ($archivo) {
                $input= array('file' => $archivo);
                $reglas= array('file' => 'mimes:jpeg,bmp,png');
                $validacion = Validator::make($input, $reglas);
                if ($validacion->fails()) {
                        echo 'Archivo Rechazado';
                }else {
                    $nombre_original=$archivo->getClientOriginalName();
                    $extencion = $archivo->getClientOriginalExtension();

                    $cod= Auth::user()->codid;
                    $nuevo_nombre = uniqid()."-".$cod."-".$nombre_original;
                    $success = \Storage::disk('local')->put($nuevo_nombre, \File::get($archivo));
                    if ($success) {
                      $e_update->img_referential=$nuevo_nombre;
                    }
                }
            }



            $e_update->district_id=strtoupper($district) ;
            $e_update->pid_created=strtoupper($pid) ;
            $e_update->date=$date;
            $e_update->tittle=$tittle;
            $e_update->action=$action;
            $e_update->description=$description;
            $e_update->name=$fuente;
            $e_update->cargo=$cargo;
            $e_update->phone=$phone;
            $e_update->latitud=$latitud;
            $e_update->longuitud=$longuitud;
            $e_update->longuitud=$longuitud;
            $e_update->img_ico=$ico;

            if ($e_update->save()) {

                return response('Correcto :-D');             

            }

        }else{
            $detail=new Emergency;

            if ($archivo) {
                $input= array('file' => $archivo);
                $reglas= array('file' => 'mimes:jpeg,bmp,png');
                $validacion = Validator::make($input, $reglas);
                if ($validacion->fails()) {
                        echo 'Archivo Rechazado';
                }else {
                    $nombre_original=$archivo->getClientOriginalName();
                    $extencion = $archivo->getClientOriginalExtension();

                    $cod= Auth::user()->codid;
                    $nuevo_nombre = uniqid()."-".$cod."-".$nombre_original;
                    $success = \Storage::disk('local')->put($nuevo_nombre, \File::get($archivo));
                    if ($success) {
                      $detail->img_referential=$nuevo_nombre;
                    }
                }
            }

            $detail->district_id=strtoupper($district) ;
            $detail->pid_created=strtoupper($pid) ;
            $detail->date=$date;
            $detail->tittle=$tittle;
            $detail->action=$action;
            $detail->description=$description;
            $detail->name=$fuente;
            $detail->cargo=$cargo;
            $detail->phone=$phone;
            $detail->latitud=$latitud;
            $detail->longuitud=$longuitud;
            $detail->longuitud=$longuitud;
            $detail->img_ico=$ico;

            if ($detail->save()) {

                return response('Correcto :-D');             

            }

        }



    }


    public function deleteEmergency(Request $request){
        $pk= $request->input("id");

        $data= Emergency::find($pk);
        $data->delete();
    }
}
