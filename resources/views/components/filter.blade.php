<div class="flex flex-wrap items-center gap-4 mb-6 text-sm">
    <div class="flex items-center gap-2">
        <span>Сортировка по дате создания:</span>

        <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}"
           class="hover:text-blue-700">
            Сначала новые
        </a>

        <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}"
           class="hover:text-blue-700">
            Сначала старые
        </a>
    </div>

    <div class="flex items-center gap-2">
        <span>Фильтрация по статусу заявки:</span>

        @foreach ($statuses as $status)
            <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $status->id]) }}"
               class="hover:text-blue-700">
                {{ $status->name }}
            </a>
        @endforeach
    </div>
</div>