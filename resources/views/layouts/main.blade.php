<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'НарушенийНЕТ' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div>
            <h1>НарушенийНЕТ</h1>

            <nav>
                <a href="/">Главная</a>
                <a href="/index">Главная страница</a>
                <a href="/second">Вторая страница</a>
                <a href="{{ route('reports.index') }}">Заявления</a>
                <a href="{{ route('reports.create') }}">Создать заявление</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>© {{ date('Y') }} София Шахвалеева</p>
    </footer>
</body>
</html>