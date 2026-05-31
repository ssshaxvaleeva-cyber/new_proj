<div>
        <span>Сортировка по дате создания: </span>
        <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}">Сначала новые</a>
        <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}">Сначала старые</a>
    </div>
    <div>
        <p>Фильтрация по статусу заявки</p>
        <ul>
            @foreach ($statuses as $status)
                <li>
                    <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $status->id]) }}">{{ $status->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>