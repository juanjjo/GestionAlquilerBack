<?php


namespace App\Http\application;


use Illuminate\Http\Request;
use App\models\Contrato;
use App\models\Local;
use App\models\Usuario;
use Mockery\Matcher\Any;

class ContratoService {
    public function __construct(){

    } 
    public function getAll(){
        return Contrato::all();
    }

    public function getById($id){
        $foundContrato = Contrato::find($id);
        if(is_null($foundContrato)){
            return null;
        }else{
            return $foundContrato;
        }
    }
    
    public function insertContrato(Request $newContrato){
        $foundInquilino = Usuario::find($newContrato->idInquilino);
        if($foundInquilino->rol=="inquilino"){
            $contratInsert = new Contrato($newContrato->toArray());
            $contratInsert->save();
            foreach($newContrato->locales as $id){
                $local = Local::find($id);
                $local->idContrato=$contratInsert->id;
                $local->save();
            }
            return $contratInsert;
        }
        return null;
    }

    public function updateContrato(Request $req,$id){
        $foundContrato = Contrato::find($id);
        if(is_null($foundContrato)){
            return null;
        }
        $foundContrato->fecha = $req->fecha;
        $foundContrato->costoTotal = $req->costoTotal;
        $foundContrato->idInquilino = $req->idInquilino;
        $foundContrato->save();
        return $foundContrato;
    }
    public function deleteContrato($id){
        $foundLocal = $this->getById($id);
        if(!$foundLocal){
            return null;
        }
        Contrato::destroy($id);
        return $foundLocal;
    }

   
}