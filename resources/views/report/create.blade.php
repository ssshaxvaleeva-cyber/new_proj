<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ НЕТ</title>
<head>
    <meta charset="UTF-8">
    <title>Создание заявления</title>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
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
</body>
</html>