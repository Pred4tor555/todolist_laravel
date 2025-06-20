@extends('layout')
@section('content')
    <h2 class="mb-4">Список задач</h2>
    {{-- Проверяем, есть ли вообще задачи --}}
    @if($tasks->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Наименование</th>
                    <th scope="col">Категория</th>
                    <th scope="col" style="width: 15%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->title}}</td>
                        <td>{{$task->category->name}}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{url('task/edit/'.$task->id)}}" class="btn btn-warning btn-sm">Редактировать</a>
                                {{-- Форма для безопасного удаления --}}
                                <form method="POST" action="{{ url('task/destroy/'.$task->id) }}" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- Пагинация с отступом сверху для красоты --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $tasks->links() }}
        </div>
    @else
        {{-- Сообщение, если задач нет --}}
        <div class="alert alert-info">
            Задач пока нет. <a href="{{ url('task/create') }}">Создать первую задачу?</a>
        </div>
    @endif
@endsection
