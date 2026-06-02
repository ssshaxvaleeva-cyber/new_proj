<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="bg-white px-4 py-3 mb-8 text-sm font-bold">
            <a href="{{ route('reports.index') }}">Главная</a> &gt; Создание заявления
        </div>

        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data" class="max-w-xl">
            @csrf

            <div>
                <input type="text"
                       id="number"
                       name="number"
                       required
                       placeholder="регистрационный номер авто"
                       class="w-full border border-blue-600 rounded px-3 py-2">
            </div>

            <div class="mt-6">
                <textarea id="description"
                          name="description"
                          rows="7"
                          required
                          placeholder="описание нарушения"
                          class="w-full border border-blue-600 rounded px-3 py-2"></textarea>
            </div>

            <div class="mt-6">
                <input type="file"
                    id="path_img"
                    name="path_img"
                    class="w-full border border-blue-600 rounded px-3 py-2">
            </div>

            <button type="submit"
                    class="mt-6 bg-red-600 text-white px-6 py-2 rounded text-sm font-bold hover:bg-red-700">
                создать заявление
            </button>
        </form>
    </div>
</x-app-layout>