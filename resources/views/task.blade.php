<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
<h2>{{$task ? "Данные задачи # ".$task->id : 'Неверный ID задачи' }}</h2>
@if ($task)
    <table border="1">
        <td>Категория</td>
        <td>Задача</td>
        <tr>
            <td>{{$task->category_id}}</td>
            <td>{{$task->title}}</td>
        </tr>
    </table>
@endif
</body>
</html>
