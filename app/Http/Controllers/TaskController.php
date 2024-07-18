<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {

        $usuarioId = Auth::id();
        $tasks = Task::where('user_id', $usuarioId)->get();
        return view('task.index', compact('tasks'));

       
    }

    public function create()
    {
        return view('task.newtask');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'status' => 'required|in:pendiente,en progreso,completada',
            'due_date' => 'required|date',
        ]);

        $usuario = Auth::user()->id;

        Task::create([
            'user_id' => $usuario,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,

        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Tarea creada exitosamente.');
    }

    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pendiente,en progreso,completada',
            'due_date' => 'required|date',
        ]);
    
        // Obtener la tarea por su ID
        $task = Task::findOrFail($id);
    
        // Actualizar los campos de la tarea con los datos del formulario
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);
    
        // Redirigir a alguna vista o página de éxito con un mensaje flash
        return redirect()->route('dashboard')->with('success', 'Tarea actualizada exitosamente.');
    }


    public function buscarTareas(Request $request)
    {
        $estado = $request->input('estado');
    
        // Filtrar y ordenar tareas según el estado y la fecha de vencimiento
        $tasks  = Task::where('status', $estado)
                      ->orderBy('due_date')
                      ->get();
    
        // Puedes pasar las tareas filtradas a una vista para mostrarlas
        return view('task.tasks', compact('tasks'));
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    
        return redirect()->route('dashboard')->with('success_del', 'Tarea eliminada exitosamente.');
    }
}
