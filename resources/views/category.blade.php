<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>{{$category ? "Список задач категории ".$category->name : 'Неверный ID категории' }}</h2>
    @if ($category)
        <table border="1">
            <td>id</td>
            <td>Наименование</td>
            @foreach ($category->tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->title}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
