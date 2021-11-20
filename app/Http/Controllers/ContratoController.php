<?php

namespace App\Http\Controllers;


use App\Http\application\LocalService;
use App\Http\application\MainService;
use Illuminate\Http\Request;
use App\models\Contrato;
use Error;
use Whoops\Handler\JsonResponseHandler;
use Mockery\Matcher\Any;

class ContratoController extends Controller
{
    protected $mainService;
    public function __construct(MainService $mainService) {
        $this->mainService = $mainService;
    }
    public function getAll(){
        return $this->mainService->contratoService->getAll();
    }

    public function getById($id){
        $foundContrato=$this->mainService->contratoService->getById($id);
        if(is_null($foundContrato)){
            return json_encode(['msg'=>'local no exist']);
        }
        return response()->json($foundContrato, 200);
    }

    public function createContrato(Request $newContrato){
        $saveContrato = $this->mainService->contratoService->insertContrato($newContrato);
        if(is_null($saveContrato)){
            return json_encode(['msg'=>'solo se permite inquilino']);
        }
        return response()->json($saveContrato, 200);
    }

    public function updateContrato(Request $req, $id){
        $updateContrato = $this->mainService->contratoService->updateContrato($req,$id);
        if(is_null($updateContrato)){
            return json_encode(['msg'=>'contrato not found']);
        }
        return response()->json([
            'message' =>  'update succsessful',
            $updateContrato
        ], 200);
    }

    public function deleteContrato($id){
        $contrato = $this->mainService->contratoService->deleteContrato($id);
        if(is_null($contrato)){
            return json_encode(['msg'=>'contrato not found']);
        }
        return response()->json([
            'message' =>  'delete succsessful',
            $contrato
        ], 200);
    }   
}













