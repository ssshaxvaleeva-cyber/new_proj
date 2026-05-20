<x-app-layout>
    <h1>Административная панель</h1>

    <table>
        <head>
            <tr>
                <th>ФИО</th>
                <th>Текст заявления</th>
                <th>Номер автомобиля</th>
                <th>Статус</th>
            </tr>
        </head>
        <body>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->user->name}}</td>
                <td>{{ $report->description }}</td>
                <td>{{ $report->number}}</td>
                <td>
                    @if ($report->status_id ==1)
                    <form class="status-form" action="{{route('reports.status.update', $report->id)}}" method="POST">
                        @method('patch')
                        @csrf
                        <select name="status_id" id="status_id">
                            @foreach ($statuses as $status)
                            <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}}> 
                                {{$status->name}}
                            </option> 
                            @endforeach
                        </select>
                    </form>
                    @else
                    <p>{{$report->status->name}}</p>
                    @endif
                </td>        
            </tr>
            @endforeach
        </body>
    </table>

    {{ $reports->links() }}
</x-app-layout>