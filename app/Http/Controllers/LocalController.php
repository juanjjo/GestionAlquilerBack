<?php

namespace App\Http\Controllers;

use App\Http\application\LocalService;
use App\Http\application\MainService;
use Illuminate\Http\Request;
use App\models\Local;
use Error;
use Whoops\Handler\JsonResponseHandler;
use Mockery\Matcher\Any;
class LocalController extends Controller
{

    protected $mainService;
    public function __construct(MainService $mainService) {
        $this->mainService = $mainService;
    }

    public function index(){
        return Local::all();
    }

    public function getById($id){
        $local = $this->mainService->localService->getById($id);
        if($local == "null"){
            return json_encode(['msg'=>'local no encontrado']);
        }
        return response()->json($local, 200);
    }

    public function createLocal(Request $local){
        $local = $this->mainService->localService->insertLocal($local);
        return response()->json($local, 200);
    }

    public function updateLocal(Request $local, $id){
        $local = $this->mainService->localService->updateLocal($local,$id);
        if(!$local){
            return json_encode(['msg'=>'local no encontrado']);
        }
        return response()->json($local, 200);
    }
    
    public function deleteLocal($id){
        $local = $this->mainService->localService->deleteLocal($id);
        if(!$local){
            return json_encode(['msg'=>'error id no exist']);
        }
        return json_encode(['msg'=>'deleted succefull']);
    }
}
