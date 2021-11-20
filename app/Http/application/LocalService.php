<?php


namespace App\Http\application;

use Illuminate\Http\Request;
use App\models\Local;
use Mockery\Matcher\Any;

class LocalService {

    public function __construct(){

    } 
    public function index(){
        return Local::all();
    }

    public function getById($id){
        $foundLocal = Local::find($id);
        if(is_null($foundLocal)){
            return  null;
        }
        return $foundLocal;
    }

    public function insertLocal(Request $local){
        $localInsert = new Local($local->toArray());
        $localInsert->save();
        return $localInsert;
    }

    public function updateLocal(Request $req,$id){
        $foundLocal = new Local();
        $foundLocal = $this->getById($id);
        if(!$foundLocal){
            return null;
        } 
        $foundLocal->superficie = $req->superficie;
        $foundLocal->imagen = $req->imagen;
        $foundLocal->alquilado = $req->alquilado;
        $foundLocal->idContrato = $req->idContrato;
        $foundLocal->save();
        return $foundLocal;
    }

    public function deleteLocal($id){
        $foundLocal = $this->getById($id);
        if(!$foundLocal){
            return null;
        }
        Local::destroy($id);
        return $foundLocal;
    }

}
