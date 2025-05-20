<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>{{$achievement? "Список пользователей, имеющих достижение: ".$achievement->description: 'Hеверный ID достижения' }}</h2>
    @if($achievement)
        <table border="1">
            <tr>
                <td>id</td>
                <td>Имя</td>
            </tr>
            @foreach ($achievement->users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
