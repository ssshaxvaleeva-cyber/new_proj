<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="bg-white px-4 py-3 mb-8 text-sm font-bold">
            Панель администратора
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white text-sm">
                <thead>
                    <tr class="bg-blue-700 text-white">
                        <th class="px-4 py-3 text-left">Дата</th>
                        <th class="px-4 py-3 text-left">ФИО подавшего</th>
                        <th class="px-4 py-3 text-left">Номер автомобиля</th>
                        <th class="px-4 py-3 text-left">Описание заявления</th>
                        <th class="px-4 py-3 text-left">Статус</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($reports as $report)
                        <tr class="odd:bg-white even:bg-red-100">
                            <td class="px-4 py-4 align-top">
                                {{ $report->created_at->format('d.m.Y') }}
                            </td>

                            <td class="px-4 py-4 align-top">
                                {{ $report->user->lastname }} {{ $report->user->name }} {{ $report->user->middlename }}
                            </td>

                            <td class="px-4 py-4 align-top">
                                {{ $report->number }}
                            </td>

                            <td class="px-4 py-4 align-top">
                                {{ $report->description }}
                            </td>

                            <td class="px-4 py-4 align-top">
                                @if ($report->status_id == 1)
                                    <form class="status-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                        @method('patch')
                                        @csrf

                                        <select name="status_id" id="status_id" class="border border-blue-600 px-2 py-1">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $status->id === $report->status_id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                @else
                                    <x-status :type="$report->status->id">
                                        {{ $report->status->name }}
                                    </x-status>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $reports->links() }}
        </div>
    </div>
</x-app-layout>