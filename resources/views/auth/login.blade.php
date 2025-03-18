<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4"
                           :status="session('status')"/>

    <form method="POST"
          action="{{ route('login') }}">
        @csrf

        <div class="text-center mb-8">
            <h1 class="login font-bold mb-1">Login to Account</h1>
            <p class="opacity-80">Please enter your email and password to continue</p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email"
                           class="opacity-80"
                           :value="__('Email address')"/>
            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username"
                          placeholder="esteban_schiller@gmail.com"/>
            <x-input-error :messages="$errors->get('email')"
                           class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex justify-between">
                <x-input-label for="password"
                               class="opacity-80"
                               :value="__('Password')"/>
                @if (Route::has('password.request'))
                    <a class="text-sm opacity-60 rounded-md"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password"
                          placeholder="• • • • • • •"/>

            <x-input-error :messages="$errors->get('password')"
                           class="mt-2"/>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me"
                   class="inline-flex items-center opacity-60">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-transparent"
                       name="remember">
                <span class="ms-2 text-sm ">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col mt-4">
            <x-primary-button class="justify-center w-full py-3 btn mt-4">
                {{ __('Sign In') }}
            </x-primary-button>
            <div class="flex items-center mt-2 justify-center">
            <p class="opacity-65 me-1">Don't have an account?</p>
            <a href="/register" class="underline opacity-100 account">Create account</a>
            </div>
        </div>
    </form>
</x-guest-layout>
