<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ НЕТ</title>
</head>
<body>
    <main>
        <div class="statement-grid">

        <a href="{{ route('reports.create') }}">Создать заявление</a>
            @foreach ($reports as $report)
            <div class="statement-card">
             <div class="report-number">{{ $report->number }}</div>
             <div class="report-description">{{ $report->description }}</div>
             <div class="report-date">{{ $report->created_at }}</div>
            </div>
            <form method="POST" action="{{ route('reports.destroy', $report->id)}}">
                @method('delete')
                @csrf
                <input type="submit" value="Удалить">
          <a href="{{ route('reports.edit', $report->id)}}">Изменить</a>
            @endforeach
        </div>
    </main>
</body>
</html>