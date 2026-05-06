<x-app-layout>
    <h1>Редактирование заявления</h1>

    <form method="POST" action="{{ route('reports.update', $report->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="number">Номер автомобиля:</label><br>
            <input type="text" id="number" name="number" value="{{ $report->number }}" required>
        </div>

        <div>
            <label for="description">Описание заявки:</label><br>
            <textarea id="description" name="description" rows="5" required>{{ $report->description }}</textarea>
        </div>

        <button type="submit">Обновить</button>
    </form>

    <br>
    <a href="{{ route('reports.index') }}">Назад к списку</a>
</x-app-layout>