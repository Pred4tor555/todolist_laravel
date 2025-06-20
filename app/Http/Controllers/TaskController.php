<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Получаем количество элементов на странице из запроса, по умолчанию 2
        $perpage = $request->perpage ?? 2;

        $tasks = Task::where('user_id', Auth::id()) // 1. Находим задачи текущего пользователя
        ->latest()                      // 2. Сортируем (новые сверху)
        ->paginate($perpage)            // 3. Разбиваем на страницы
        ->withQueryString();            // 4. Добавляем к ссылкам пагинации текущие параметры URL

        // Передаем отфильтрованные и разбитые на страницы задачи в представление
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $validated['user_id'] = Auth::id();

        $task = new Task($validated);
        $task->save();

        return redirect('/task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('task', [
            'task' => Task::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Gate::allows('edit-task', Task::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на редактирование задачи номер ' . $id);
        }

        return view('task_edit', [
            'task' => Task::all()->where('id', $id)->first(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. ВАЛИДАЦИЯ
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        // 2. ПОИСК ЗАДАЧИ
        // findOrFail - лучший способ. Он быстрее и вернет ошибку 404, если задача не найдена.
        $task = Task::findOrFail($id);


        // 3. ОБНОВЛЕНИЕ И СОХРАНЕНИЕ
        $task->title = $validated['title'];
        $task->category_id = $validated['category_id'];
        $task->save();

        // 4. ПЕРЕНАПРАВЛЕНИЕ
        return redirect('/task')->with('success', 'Задача успешно обновлена!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-task', Task::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на удаление задачи номер ' . $id);
        }

        Task::destroy($id);
        return back()->withErrors(['success' => 'Задача успешно удалена!']);
    }
}
