@extends('layout')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h2 class="mb-4">Редактирование задачи: "{{ $task->title }}"</h2>

            {{-- Форма отправляет данные на роут обновления --}}
            <form method="post" action="{{ url('/task/update/'.$task->id) }}">
                @csrf
                @method('PATCH')

                {{-- Поле для наименования --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title"
                           value="{{ old('title', $task->title) }}"> {{-- Упрощенная логика --}}

                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Поле для выбора категории --}}
                <div class="mb-3">
                    <label for="category" class="form-label">Категория</label>
                    <select class="form-select @error('category_id') is-invalid @enderror"
                            id="category" name="category_id">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                    {{-- Упрощенная и более надежная логика для выбора опции --}}
                                    @if(old('category_id', $task->category_id) == $category->id) selected @endif
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Кнопка сохранения --}}
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Отмена</a>

            </form>
        </div>
    </div>

@endsection
