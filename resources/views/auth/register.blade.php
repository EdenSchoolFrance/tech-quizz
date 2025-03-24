<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="text-center mb-8">
            <h1 class="login font-bold mb-1">Create an Account</h1>
            <p class="opacity-80">Create a account to continue</p>
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

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" class="opacity-80" :value="__('Username')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                          autofocus autocomplete="name" placeholder="Username"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="opacity-80" :value="__('Password')"/>
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

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="opacity-80" :value="__('Password confirmation')"/>
            <x-text-input id="password_confirmation"
                          class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation"
                          required
                          autocomplete="current-password"
                          placeholder="• • • • • • •"/>

            <x-input-error :messages="$errors->get('password_confirmation')"
                           class="mt-2"/>
        </div>

        <div class="block mt-4">
            <label for="remember_me"
                   class="inline-flex items-center opacity-60">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-transparent"
                       name="remember">
                <span class="ms-2 text-sm ">{{ __('I accept terms and conditions') }}</span>
            </label>
        </div>

        <div class="flex flex-col mt-4">
            <x-primary-button class="justify-center w-full py-3 btn mt-4">
                {{ __('Sign Up') }}
            </x-primary-button>
            <div class="flex items-center mt-2 justify-center">
                <p class="opacity-65 me-1">Already have an account?</p>
                <a href="/" class="underline opacity-100 account">Login</a>
            </div>
        </div>
    </form>
</x-guest-layout>
