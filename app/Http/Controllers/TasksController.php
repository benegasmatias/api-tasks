<?php

namespace App\Http\Controllers;

use App\Models\Tasks;

use Illuminate\Http\Request;

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

    public function index(Request $request)
    {

        //Solo si es de tipo appicationjson se devuelve. Es decir solo de una app no de un navegador
        if ($request->isJson()) {
            // Eloquent para activarlos hay que descomentar una linea de codigo($app->withEloquent();) ubicada en ./bootstrap/app.php
            $users = Tasks::all();
            return response()->json([$users], 200);
        }
        return response()->json(['error' => 'Unautorized'], 401, []);
    }

    public function addTask(Request $request)
    {
        if ($request->isJson()) {
            $task = new Tasks;
            $task->name = $request->name;
            $task->description = $request->description;

            if($task->save()){
                return response()->json($task, 201);
            }else{
                return response()->json(['error' => 'Tarea no creada'], 400);
            }

           
        }
        return response()->json(['error' => 'Unautorized'], 401, []);
    }

  
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


   



    public function deleteTask(Request $request)
    {  
       
            $task = Tasks::find($request->id);
            if($task){
                if($task->delete()){
                    return response()->json(['Exito  delete '], 201);
                }
            }else{
                return response()->json(['error' => 'La tarea no existe'], 401);
            }
            
            
        
       
    }

   


   
}
