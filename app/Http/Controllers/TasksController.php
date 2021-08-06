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

    public function index()
    {

        //Solo si es de tipo appicationjson se devuelve. Es decir solo de una app no de un navegador
    
            // Eloquent para activarlos hay que descomentar una linea de codigo($app->withEloquent();) ubicada en ./bootstrap/app.php
            $tasks = Tasks::all();
            return response()->json(['tasks'=>$tasks], 200);
      
    }
    public function getTasksPagination($cant){
      
        $tasks = Tasks::paginate( intval($cant));
        return response()->json(['tasks'=>$tasks], 200);
    }
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
