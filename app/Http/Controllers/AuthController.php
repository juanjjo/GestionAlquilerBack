<?php

namespace App\Http\Controllers;

use App\Http\application\MainService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    protected $mainService;
    public function __construct(MainService $mainService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->mainService = $mainService;
    }

    public function login(Request $request)
    {
        return $this->mainService->authService->login($request);
    }


    public function me()
    {
        return $this->mainService->authService->me();
    }


    public function logout()
    {
        return $this->mainService->authService->logout();
    }


    public function refresh()
    {
        return $this->mainService->authService->refresh();
    }



    public function register(Request $request)
    {
        $valid = $this->mainService->validateRegisterUser($request);
        if (!is_null($valid)) {
            return response()->json($valid, 400);
        }
        return $this->mainService->authService->register($request);
    }
}
