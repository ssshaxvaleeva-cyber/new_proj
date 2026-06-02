<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6">

        <div class="mb-6">
            <a href="{{ route('reports.create') }}"
               class="inline-block bg-red-600 text-white px-6 py-2 rounded text-sm font-bold hover:bg-red-700">
                создать заявление
            </a>
        </div>

        <x-filter />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($reports as $report)
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-red-600 font-bold text-sm">
                                {{ $report->created_at->format('d.m.Y') }}
                            </p>

                            <p class="font-bold text-sm mt-2">
                                {{ $report->number }}
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('reports.edit', $report->id) }}" class="text-black">
                                ✎
                            </a>

                            <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="text-black">
                                    🗑
                                </button>
                            </form>
                        </div>
                    </div>

                    <p class="text-sm mt-4 leading-5">
                        {{ $report->description }}
                    </p>

                    @if ($report->path_img)
                        <img src="{{ asset('images/' . $report->path_img) }}"
                            alt="Изображение нарушения"
                            class="mt-4 w-full h-40 object-cover rounded">
                    @endif

                    <div class="mt-6 text-sm">
                        <x-status :type="$report->status->id">
                            {{ $report->status->name }}
                        </x-status>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $reports->appends(request()->query())->links() }}
        </div>
    </div>
</x-app-layout>             