<?php


namespace App\Http\application;

use App\Enums\Roles;
use Illuminate\Http\Request;
use App\models\Usuario;
use Mockery\Matcher\Any;

class UsuarioService {

    public function __construct(){

    } 
    public function getAll(){
        return Usuario::all();
    }

    public function getById($id){
        $foundUsuario = Usuario::find($id);
        if(is_null($foundUsuario)){
            return  null;
        }
        return $foundUsuario;
    }

   

    // public function updateLocal(Request $req,$id){
    //     $foundUsuario = new Usuario();
    //     $foundUsuario = $this->getById($id);
    //     if(!$foundUsuario){
    //         return null;
    //     } 
    //     $foundUsuario->superficie = $req->superficie;
    //     $foundUsuario->imagen = $req->imagen;
    //     $foundUsuario->alquilado = $req->alquilado;
    //     $foundUsuario->idContrato = $req->idContrato;
    //     $foundUsuario->save();
    //     return $foundUsuario;
    // }

    // public function deleteLocal($id){
    //     $foundLocal = $this->getById($id);
    //     if(!$foundLocal){
    //         return null;
    //     }
    //     Usuario::destroy($id);
    //     return $foundLocal;
    // }

}
