<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
      // Отримуємо всі завдання з бази даних
      $tasks = Task::all();
  
      // Повертаємо їх у вигляді JSON
      return response()->json($tasks);
    }

    public function store(Request $request)
    {
      // Створюємо нове завдання
      $task = new Task();
      $task->title = $request->input('title');
      $task->description = $request->input('description');
      $task->dueDate = $request->input('dueDate');
  
      // Зберігаємо завдання в базі даних
      $task->save();
  
      // Повертаємо успішний код
      return response()->json([
        'success' => true,
      ]);
    }
}
