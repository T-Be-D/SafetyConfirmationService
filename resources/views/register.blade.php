<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex space-x-5">
            <!-- Student_id 項目追加のみ-->
            <div>
                <x-input-label for="student_id" :value="__('Student_ID')" />
                <x-text-input id="student_id" class="block mt-1 w-50" type="number" name="student_id" :value="old('student_id')"
                    required autofocus autocomplete="student_id" />
                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>

            <!-- Class 項目追加のみ-->
            <div>
                <x-input-label for="class" :value="__('Class')" />
                <x-text-input id="class" class="block mt-1 w-50" type="text" name="class" :value="old('name')"
                    required autofocus autocomplete="class" />
                <x-input-error :messages="$errors->get('class')" class="mt-2" />
            </div>
        </div>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="田中 太郎" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex space-x-5">

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="ecc123@ecc.ac.jp" :value="old('email')"
                    required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- contact 項目追加のみ -->
            <div class="mt-4">
                <x-input-label for="contact" :value="__('Contact')" />
                <x-text-input id="contact" class="block mt-1 w-full" type="number" name="contact" placeholder="06-6374-0144" :value="old('contact')"
                    required autofocus autocomplete="contact" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="半角英数字8文字以上" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center">

            <x-primary-button class="w-1/4 mt-5">
                {{ __('Register') }}
            </x-primary-button>

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mt-3"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>


        </div>
    </form>
</x-guest-layout>
