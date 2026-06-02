<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-8">
                <a href="{{ route('reports.index') }}" class="text-3xl font-bold">
                    <span class="text-blue-700">НАРУШЕНИЙ</span><span class="text-red-600">.НЕТ</span>
                </a>

                <div class="hidden sm:flex gap-6 text-sm">
                    <a href="{{ route('reports.index') }}" class="hover:text-blue-700">
                        Заявления
                    </a>

                    <a href="{{ route('reports.create') }}" class="hover:text-blue-700">
                        Создать заявление
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex items-center gap-4 text-sm">
                <div>
                    {{ Auth::user()->lastname }} {{ Auth::user()->name }} {{ Auth::user()->middlename }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="border border-blue-700 px-6 py-1 hover:bg-blue-700 hover:text-white">
                        Выйти
                    </button>
                </form>
            </div>

            <div class="sm:hidden">
                <button @click="open = ! open" class="text-blue-700">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden px-4 pb-4">
        <a href="{{ route('reports.index') }}" class="block py-2">
            Заявления
        </a>

        <a href="{{ route('reports.create') }}" class="block py-2">
            Создать заявление
        </a>

        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="border border-blue-700 px-6 py-1">
                Выйти
            </button>
        </form>
    </div>
</nav>