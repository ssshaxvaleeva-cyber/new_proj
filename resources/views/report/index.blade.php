<x-app-layout>
    <x-slot name="header">
     <h2>Мои заявления</h2>
    </x-slot>
    <x-filter />
    <div class="statement-grid">
        <a href="{{ route('reports.create') }}">Создать заявление</a>
        @foreach ($reports as $report)
            <div class="statement-card">
                <div class="report-number">{{ $report->number }}</div>
                <div class="report-description">{{ $report->description }}</div>
                <div class="report-date">{{ $report->created_at }}</div>
                <x-status :type="$report->status->id">
                 {{ $report->status->name }}
                </x-status>
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