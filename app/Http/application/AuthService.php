<?php


namespace App\Http\application;

use App\models\Perfil;
use App\models\Usuario;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function register(Request $request)
    {
      /*   $validator = Validator::make($request->all(), [
            'usuario' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        } */

        $perfilInsert = $this->createPerfil($request->perfil);
        $usuario = new Usuario($request->toArray());
        if($usuario->rol==""){
            $usuario->rol="inquilino";
        }
        $usuario->id_perfil = $perfilInsert->id;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return response()->json([
            'message' => 'Usuario Registrado',
            'usuario' => $usuario
        ], 201);
    }

    private function createPerfil($perfil)
    {
        $perfil = new Perfil($perfil);
        $perfil->save();
        return $perfil;
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}