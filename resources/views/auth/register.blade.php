<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">
            <span class="text-blue-700">НАРУШЕНИЙ</span><span class="text-red-600">.НЕТ</span>
        </h1>
        <p class="text-blue-700 mt-4 text-lg">Регистрация</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-text-input id="login" class="block mt-1 w-full border-blue-500" type="text" name="login" :value="old('login')" required autofocus placeholder="логин" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full border-blue-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="пароль" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
           <x-text-input id="lastname" class="block mt-1 w-full border-blue-500" type="text" name="lastname" :value="old('lastname')" required placeholder="фамилия" />
           <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-text-input id="name" class="block mt-1 w-full border-blue-500" type="text" name="name" :value="old('name')" required autocomplete="name" placeholder="имя" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-text-input id="middlename" class="block mt-1 w-full border-blue-500" type="text" name="middlename" :value="old('middlename')" required placeholder="отчество" />
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
        </div>

        <div class="mt-4">
          <x-text-input id="tel" class="block mt-1 w-full border-blue-500" type="tel" name="tel" :value="old('tel')" required placeholder="телефон" />
          <x-input-error :messages="$errors->get('tel')" class="mt-2" />
       </div>

        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="адрес" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <input type="hidden" name="password_confirmation" id="password_confirmation">

        <div class="mt-6">
            <button type="submit" onclick="document.getElementById('password_confirmation').value = document.getElementById('password').value"
                    class="w-full bg-blue-700 text-white py-2 rounded hover:bg-blue-800">
                создать аккаунт
            </button>
        </div>

        <div class="text-center mt-4 text-sm">
            <span>У вас уже есть аккаунт?</span>
            <a class="text-blue-700" href="{{ route('login') }}">Войти</a>
        </div>
    </form>
</x-guest-layout> 