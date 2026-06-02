<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="bg-white px-4 py-3 mb-8 text-sm font-bold">
            <a href="{{ route('reports.index') }}">Главная</a> &gt; Редактирование заявления
        </div>

        <form method="POST" action="{{ route('reports.update', $report->id) }}" enctype="multipart/form-data" class="max-w-xl">
            @csrf
            @method('PUT')

            <div>
                <label for="number" class="block mb-2 text-sm">Регистрационный номер</label>
                <input type="text"
                       id="number"
                       name="number"
                       value="{{ $report->number }}"
                       required
                       class="w-full border border-blue-600 rounded px-3 py-2">
            </div>

            <div class="mt-6">
                <label for="description" class="block mb-2 text-sm">Описание нарушения</label>
                <textarea id="description"
                          name="description"
                          rows="7"
                          required
                          class="w-full border border-blue-600 rounded px-3 py-2">{{ $report->description }}</textarea>
            </div>

            @if ($report->path_img)
                <div class="mt-6">
                    <p class="mb-2 text-sm">Текущее изображение</p>
                    <img src="{{ asset('images/' . $report->path_img) }}"
                        alt="Изображение нарушения"
                        class="w-64 h-40 object-cover rounded">
                </div>
            @endif

            <div class="mt-6">
                <label for="path_img" class="block mb-2 text-sm">Изменить изображение</label>
                <input type="file"
                    id="path_img"
                    name="path_img"
                    class="w-full border border-blue-600 rounded px-3 py-2">
            </div>

            <button type="submit"
                    class="mt-6 bg-red-600 text-white px-6 py-2 rounded text-sm font-bold hover:bg-red-700">
                обновить заявление
            </button>
        </form>
    </div>
</x-app-layout>