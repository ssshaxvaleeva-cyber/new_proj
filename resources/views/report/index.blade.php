<x-app-layout>
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
    <div class="statement-grid">
        <a href="{{ route('reports.create') }}">Создать заявление</a>
        @foreach ($reports as $report)
            <div class="statement-card">
                <div class="report-number">{{ $report->number }}</div>
                <div class="report-description">{{ $report->description }}</div>
                <div class="report-date">{{ $report->created_at }}</div>
                <div class="report-status">{{ $report->status->name }}</div>
            </div>
            <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
                @method('delete')
                @csrf
                <input type="submit" value="Удалить">
            </form>
            <a href="{{ route('reports.edit', $report->id) }}">Изменить</a>
        @endforeach
        {{ $reports->appends(request()->query())->links() }}
    </div>
</x-app-layout>                      