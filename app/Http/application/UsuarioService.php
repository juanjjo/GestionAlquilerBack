<?php


namespace App\Http\application;

use App\Enums\Roles;
use Illuminate\Http\Request;
use App\models\Usuario;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Any;
use PhpParser\Node\Stmt\Foreach_;

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

    public function getOnePasswordUser($usuario,$password){
        // $foundUsu = new Usuario();
        // $foundUsu = Usuario::find(1);
        // $foundUsu->id_perfil = Usuario::find(1)->perfil;

        // return response()->json($foundUsu, 200);

        $foundUsu = Usuario::where('usuario', $usuario)
        ->get();
         if (Hash::check($password, $foundUsu[0]->password))
        {
            $foundUsu[0]->id_perfil = Usuario::find(1)->perfil;
            return $foundUsu[0];
        }
        // $foundUsu->id_perfil = Usuario::find($foundUsu->id_perfil)->perfil;
        return null;
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
