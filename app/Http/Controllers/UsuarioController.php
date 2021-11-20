<?php

namespace App\Http\Controllers;
use App\Http\application\MainService;
use App\models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $mainService;
    public function __construct(MainService $mainService) {
        $this->mainService = $mainService;
        $this->middleware('auth.role:admin', ['only' => ['blockUser']]);
    }
    // public function __construct()
    // {
    //    
    // }
    
    public function getAll(){
        return $this->mainService->usuarioService->getAll();
    }
    public function getOne($id){
        $foundUsu = $this->mainService->usuarioService->getById($id);
        if(!$foundUsu){
            return json_encode(['msg'=>'local no encontrado']);
        }
        return response()->json($foundUsu, 200);
    }
    
    public function blockUser()
    {
        return 'This is an admin route.';
    }
    public function profile()
    {
        return 'This route is for all users.';
    }
}
