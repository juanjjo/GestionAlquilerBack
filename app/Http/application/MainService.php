<?php

namespace App\Http\application;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
class MainService
{
    public $localService;
    public $usuarioService;
    public $contratoService;
    public $authService;
    public function __construct(
        LocalService $localService,
        UsuarioService $usuarioService,
        ContratoService $contratoService,
        AuthService $authService
    ) {
        $this->localService = $localService;
        $this->usuarioService = $usuarioService;
        $this->contratoService = $contratoService;
        $this->authService = $authService;
    }


    public function validateRegisterUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario' => 'required',
            'password' => 'required',
            'perfil' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        return null;
    }
}
