<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
<h2>Список задач</h2>
<table border="1">
    <thead>
        <td>id</td>
        <td>Наименование</td>
        <td>Категория</td>
        <td>id пользователя</td>
    </thead>
    @foreach ($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->category->name}}</td>
            <td>{{$task->user_id}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
