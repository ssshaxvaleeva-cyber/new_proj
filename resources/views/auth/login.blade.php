<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">
            <span class="text-blue-700">НАРУШЕНИЙ</span><span class="text-red-600">.НЕТ</span>
        </h1>
        <p class="text-blue-700 mt-4 text-lg">Авторизация</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-text-input id="login" class="block mt-1 w-full border-blue-500" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" placeholder="логин" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full border-blue-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="пароль" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit"
                    class="w-full bg-blue-700 text-white py-2 rounded hover:bg-blue-800">
                войти
            </button>
        </div>

        <div class="text-center mt-4 text-sm">
            <span>У вас нет аккаунта?</span>
            <a class="text-blue-700" href="{{ route('register') }}">Зарегистрироваться</a>
        </div>
    </form>
</x-guest-layout>