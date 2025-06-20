@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="post" action="{{url('task')}}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" aria-describedby="titleHelp" value="{{ old('title') }}">
                    <div id="titleHelp" class="form-text">Введите задачу (макс. 150 символов)</div>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Категория</label>
                    <select class="form-select" id="category" name="category_id" aria-describedby="categoryHelp" value="{{ old('category_id') }}">
                        <option style="display: none">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                    @if(old('category_id') == $category->id) selected
                                @endif>{{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <div id="categoryHelp" class="form-text">Выберите категорию</div>
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
