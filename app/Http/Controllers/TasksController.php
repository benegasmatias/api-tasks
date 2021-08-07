<?php

namespace App\Http\Controllers;

use App\Models\Tasks;

use Illuminate\Http\Request;
/**
* @OA\Info(title="API tareas", version="1.0")
*
* @OA\Server(url="http://localhost/api-tasks/public")
*/


class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
    * @OA\Get(
    *     path="/api/task",
    *     summary="Mostrar las tareas",
   
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todas las tareas"
    *     ),
     *     security={{ "apiAuth": {} }}
    * )
    */
    public function index()
    {

        //Solo si es de tipo appicationjson se devuelve. Es decir solo de una app no de un navegador
    
            // Eloquent para activarlos hay que descomentar una linea de codigo($app->withEloquent();) ubicada en ./bootstrap/app.php
            $tasks = Tasks::all();
            return response()->json(['tasks'=>$tasks], 200);
      
    }

    /**
    * @OA\Get(
    *     path="/task/{cant}",
    *     summary="Mostrar las tareas dependiendo de la cantidad que se le mande",
    *      @OA\Parameter(
    *         name="cant",
    *         in="path",
    *         required=true,
    *    @OA\Schema(
    *          type="integer",
    *          default=2,
    *      )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Devuelve un json del paginador."
    *     ),
    *     security={{ "apiAuth": {} }}
    * )
    */
    public function getTasksPagination($cant){
      
        $tasks = Tasks::paginate( intval($cant));
        return response()->json(['tasks'=>$tasks], 200);
    }

         /**
 * @OA\Post(
 * path="/api/task",
 * summary="New Task",
 * description="Crea una nueva tarea",
 * operationId="store",
 * tags={"Post"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Objeto tarea",
 *    @OA\JsonContent(
 *       required={"name","description"},
 *       @OA\Property(property="name", type="string", format="text", example="nuevaTarea"),
 *       @OA\Property(property="description", type="string", format="text", example="description")
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Se creo una nueva",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="{status:1,taks:{name:tarea,description:description}}")
 *        )
 *     ),
 *   security={{ "apiAuth": {} }}
 * )
 */
    public function addTask(Request $request)
    {
       
            $task = new Tasks;
            if($request->name){
                $task->name = $request->name;
                $task->description = $request->description;

                if($task->save()){
                    return response()->json(['status'=>1,'task'=>$task], 200);
                }else{
                    return response()->json(['error' => 'Tarea no creada'], 400);
                }
            }else{
                return response()->json(['error' => 'name no puede ser null'], 400);
            }

           
    }

            /**
         * @OA\Put(
         * path="/api/task",
         * summary="Edit Task",
         * description="Edita una tarea",
         * operationId="edit",
         * tags={"Put"},
         * @OA\RequestBody(
         *    required=true,
         *    description="Objeto tarea",
         *    @OA\JsonContent(
         *       required={"name","description"},
         *       @OA\Property(property="name", type="string", format="text", example="nuevaTarea"),
         *       @OA\Property(property="description", type="string", format="text", example="description")
         *    ),
         * ),
         * @OA\Response(
         *    response=200,
         *    description="Se guardo Correctamente",
         *    @OA\JsonContent(
         *       @OA\Property(property="message", type="string", example="{status:1,taks:{name:tarea,description:description}}")
         *        )
         *     ),
         *     security={{ "apiAuth": {} }}
         * )
         */
    public function editTask(Request $request)
    {
  
            $task = Tasks::find($request->id);
            if($task){
                $task->name = $request->name;
                $task->decription = $request->last_name;
                
                if($task->save()){
                        return response()->json(['Se guardo Correctamente'=>$task], 201);
                }
                else
                    return response()->json(['Error al guardar'], 401);
            } 
            else
            return response()->json(['La tarea no existe.'], 400);

       
    }


   

/**
     * @OA\Delete(
     *     path="/api/task",
     *     summary="Delete Task",
     *     operationId="delete",
     *     tags={"Delete"},
     *  @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *    @OA\Schema(
    *          type="integer"
    *          
    *      )
    *     ),
     *     @OA\Response(
     *         response=201,
     *         description="exito"
     *        
     *     ),
     *     security={{ "apiAuth": {} }}
     * )
     * @param Request $request
     * @return array
     */

    public function deleteTask($id)
    {  
       
            $task = Tasks::find($id);
            if($task){
                if($task->delete()){
                    return response()->json(['status'=>'1','Exito  delete'], 201);
                }
            }else{
                return response()->json(['error' => 'La tarea no existe'], 401);
            }

    }

   


   
}
