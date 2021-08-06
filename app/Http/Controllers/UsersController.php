<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;


class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'createUser', 'getToken']]);
    }
    public function index(Request $request)
    {

        //Solo si es de tipo appicationjson se devuelve. Es decir solo de una app no de un navegador
       
            // Eloquent para activarlos hay que descomentar una linea de codigo($app->withEloquent();) ubicada en ./bootstrap/app.php
            $users = User::all();
            return response()->json([$users], 200);
    
    }

    public function createUser(Request $request)
    {
   
            //Eloquent tiene un facadas(necesitan ser activadas) create
            $user = new User;
            $user->username = $request->username;
            $user->password=Hash::make($request->password);
            $user->api_token = Str::random(60);
         
            if($user->save()){
                return response()->json($user, 201);
            }else{
                return response()->json(['No se guardo el usuario'], 400);
            }

     
    }

  
  

        // if ($request->password && $request->confirma_password)
        // if ($request->password == $request->confirma_password)
        //     $user->password = Hash::make($request->password);
   



    public function delete(Request $request)
    {
        if ($request->isJson()) {
            $user = User::where('email', $request->email)->first();
            $user->delete();
            return response()->json(['Success  delete ' => $user], 201);
        }
        return response()->json(['error' => 'Unautorizes'], 401, []);
    }

   

    public function getToken(Request $request) {
        try{

           
                //user comun
                $user = User::where('username', $request->username)->first();

            if($user && Hash::check($request->password,$user->password)){
                
                   $credentials = $request->only(['username', 'password','id']);
                   if (!$token = Auth::attempt($credentials)) {
                        return response()->json(['message' => 'Unauthorized'], 401);
                    }
                    $api_token = $this->respondWithToken($token);
                    
                    return response()->json(['user'=>$user,'token'=>$api_token],200);
                     
                    
                  
                }else{
                   return response()->json(['error'=>'No Content'],406);
                   }
            
         }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'No content'],406);
        }
    }

   
}
