<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
<h2>Редактирование задачи</h2>
<form method="post" action={{url('task/update/'.$task->id)}}>
    @csrf
    <label>Наименование</label>
    <input type="text" name="title" value="@if (old('title')) {{old('title')}} @else {{$task->title}} @endif " />
    @error('title')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    <br>

    <label>Категория:</label>
    <select name="category_id" value="{{ old('category_id') }}">
        <option style="display: none">
        @foreach ($categories as $category)
            <option value="{{$category->id}}"
                    @if(old('category_id'))
                        @if(old('category_id') == $category->id) selected @endif
                    @else
                        @if($task->category_id == $category->id) selected @endif
                @endif >{{$category->name}}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>
    <input type="submit">
</form>
</body>
</html>
