<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>{{$user? "Список достижений пользователя ".$user->name: 'Hеверный ID пользователя' }}</h2>
    @if($user)
        <table border="1">
            <tr>
                <td>id</td>
                <td>Описание</td>
            </tr>
            @foreach ($user->achievements as $achievement)
                <tr>
                    <td>{{$achievement->id}}</td>
                    <td>{{$achievement->description}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
