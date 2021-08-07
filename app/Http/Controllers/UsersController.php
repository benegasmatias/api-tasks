<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
* @OA\Info(title="API tareas", version="1.0")
*
* @OA\Server(url="http://localhost/api-tasks/public")
*/
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

   /**
    * @OA\Get(
    *     path="/api/users",
    *     summary="Mostrar usuarios",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los usuarios."
    *     )
    * )
    */
    public function index()
    {

            // Eloquent para activarlos hay que descomentar una linea de codigo($app->withEloquent();) ubicada en ./bootstrap/app.php
            $users = User::all();
            return response()->json([$users], 200);
    
    }
          /**
         * @OA\Post(
         * path="/api/users/client",
         * summary="new User",
         * description="Crea un nuevo usuario",
         * operationId="store",
         * tags={"Post"},
         * @OA\RequestBody(
         *    required=true,
         *    description="Objeto User",
         *    @OA\JsonContent(
         *       required={"username","password"},
         *       @OA\Property(property="username", type="string", format="text", example="admin"),
         *       @OA\Property(property="password", type="string", format="text", example="admin")
         *    ),
         * ),
         * @OA\Response(
         *    response=200,
         *    description="Se guardo Correctamente",
         *    @OA\JsonContent(
         *       @OA\Property(property="message", type="string", example="{user:{username:admin,password:admin,api_token:asdsa123}}")
         *        )
         *     ),
         *     security={{ "apiAuth": {} }}
         * )
         */
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

   
          /**
 * @OA\Post(
 * path="/users/login",
 * summary="Sign in",
 * description="Login by Username, password",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345")
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="No Content")
 *        )
 *     )
 * )
 */
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
