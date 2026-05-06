<x-app-layout>
    <h1>Новое заявление</h1>

    <form method="POST" action="{{ route('reports.store') }}">
        @csrf
        <div>
            <label for="number">Номер автомобиля:</label><br>
            <input type="text" id="number" name="number" required>
        </div>

        <div>
            <label for="description">Описание заявки:</label><br>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>

        <button type="submit">Создать</button>
    </form>

    <br>
    <a href="{{ route('reports.index') }}">Назад к списку</a>
</x-app-layout>