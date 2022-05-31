<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form id="register-form" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div class="form-group">
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>
            <!-- Email Address -->
            <div class="mt-4 form-group">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4 form-group">
                <x-label for="password" :value="__('Password')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 form-group">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="mt-4 form-group">
                <x-label for="phone" :value="__('Phone')"/>

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                         autofocus/>
            </div>

            <div class="mt-4 form-group">
                <x-label for="location" :value="__('Location')"/>

                <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')"
                         required autofocus/>
            </div>
            <div class="mt-4 form-group">
                <x-label for="gender" :value="__('Gender')"/>

                <select id="gender" class=" form-select block mt-1 w-full" type="text" name="gender"
                        :value="old('gender')" required autofocus>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mt-4 form-group">
                <x-label for="age" :value="__('Age')"/>

                <x-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required
                         autofocus/>
            </div>

            <div class="mt-4 form-group">
                <x-label for="relationship" :value="__('Relationship status')"/>

                <select id="relationship" class=" form-select block mt-1 w-full" type="text" name="relationship"
                        :value="old('relationship')" required autofocus>
                    <option value="Single">Single</option>
                    <option value="Complicated">Complicated</option>
                    <option value="Taken">Taken</option>
                    <option value="Married">Married</option>
                </select>

            </div>
            <div class="mt-4 form-group">
                <x-label for="description" :value="__('Your profile description')"/>

                <textarea id="description" class="form-textarea block mt-1 w-full" name="description" required autofocus>
                </textarea>

            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-pink" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        {!! JsValidator::formRequest('App\Http\Requests\Auth\RegisterRequest', '#register-form'); !!}

    </x-auth-card>
</x-guest-layout>
