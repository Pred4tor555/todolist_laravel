{{--
  Обертка для красивого расположения.
  Отображается всегда, даже если задач нет.
--}}
<div class="d-flex justify-content-between align-items-center mt-4">

    {{--
      ЧАСТЬ 1: ССЫЛКИ НА СТРАНИЦЫ
      Этот блок будет отображаться только когда страниц больше одной.
    --}}
    @if ($paginator->hasPages())
        <nav>
            <ul class="pagination mb-0">
                {{-- Кнопка "Назад" --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">‹</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a>
                    </li>
                @endif

                {{-- Номера страниц --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Кнопка "Вперед" --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">›</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">›</span>
                    </li>
                @endif
            </ul>
        </nav>
    @else
        {{-- Пустой div-заглушка, чтобы форма оставалась справа, даже если ссылок нет --}}
        <div></div>
    @endif

    {{--
      ЧАСТЬ 2: ФОРМА ВЫБОРА КОЛИЧЕСТВА ЭЛЕМЕНТОВ
      Этот блок теперь находится ВНЕ условия hasPages() и будет виден всегда,
      если в пагинаторе есть хотя бы один элемент.
    --}}
    @if ($paginator->total() > 0)
        <div class="d-flex align-items-center gap-2">
            <span class="text-muted small">На странице:</span>
            <form method="get" action="{{ url()->current() }}">
                <select name="perpage" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="2" @if($paginator->perPage() == 2) selected @endif >2</option>
                    <option value="3" @if($paginator->perPage() == 3) selected @endif >3</option>
                    <option value="4" @if($paginator->perPage() == 4) selected @endif >4</option>
                </select>
            </form>
        </div>
    @endif
</div>
