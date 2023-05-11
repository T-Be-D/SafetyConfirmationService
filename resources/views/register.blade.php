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
            {{-- <div>
                <x-input-label for="class" :value="__('Class')" />
                <x-text-input id="class" class="block mt-1 w-50" type="text" name="class" :value="old('class')"
                    required autofocus autocomplete="class" />
                <x-input-error :messages="$errors->get('class')" class="mt-2" />
            </div> --}}
            <div>
                <x-input-label for="class" :value="__('Class')" />
                <div class="mt-1">
                    <div style="display: flex;">
                        <select id="class_type" name="class_type" class="block mt-1 w-50 rounded" required autofocus
                            autocomplete="class_type" style="background-color: white;">
                            <option value="IE">IE</option>
                            <option value="SK">SK</option>
                            <option value="teacher">教員</option>
                        </select>
                        <select id="class" name="class" class="block mt-1 w-50 rounded" required autofocus
                            autocomplete="class" style="background-color: white;">
                        </select>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('class')" class="mt-2" />
            </div>
            <script>
                const classTypeSelect = document.getElementById('class_type');
                const classSelect = document.getElementById('class');

                const classOptions = {
                    IE: [{
                            value: 'IE1A',
                            label: 'IE1A'
                        },
                        {
                            value: 'IE1B',
                            label: 'IE1B'
                        },
                        {
                            value: 'IE2A',
                            label: 'IE2A'
                        },
                        {
                            value: 'IE2B',
                            label: 'IE2B'
                        },
                        {
                            value: 'IE3A',
                            label: 'IE3A'
                        },
                        {
                            value: 'IE3B',
                            label: 'IE3B'
                        },
                        {
                            value: 'IE4A',
                            label: 'IE4A'
                        },
                        {
                            value: 'IE4B',
                            label: 'IE4B'
                        }
                    ],
                    SK: [{
                            value: 'SK1A',
                            label: 'SK1A'
                        },
                        {
                            value: 'SK1B',
                            label: 'SK1B'
                        },
                        {
                            value: 'SK2A',
                            label: 'SK2A'
                        },
                        {
                            value: 'SK2B',
                            label: 'SK2B'
                        },
                        {
                            value: 'SK3A',
                            label: 'SK3A'
                        },
                        {
                            value: 'SK3B',
                            label: 'SK3B'
                        }
                    ],
                    teacher: [{
                            value: '校長',
                            label: '校長'
                        },
                        {
                            value: '教頭',
                            label: '教頭'
                        },
                        {
                            value: '教員',
                            label: '教員'
                        }
                    ]
                };

                // Update the options in the class select element
                function updateClassOptions() {
                    const selectedClassType = classTypeSelect.value;
                    const options = classOptions[selectedClassType];

                    // Clear current options
                    classSelect.innerHTML = '';

                    // Add new options
                    options.forEach(option => {
                        const {
                            value,
                            label
                        } = option;
                        const optionElement = document.createElement('option');
                        optionElement.value = value;
                        optionElement.textContent = label;
                        classSelect.appendChild(optionElement);
                    });
                }

                // Add event listener for class type select
                classTypeSelect.addEventListener('change', updateClassOptions);

                // Initialize the class options
                updateClassOptions();
            </script>
        </div>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="田中 太郎"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex space-x-5">

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    placeholder="ecc123@ecc.ac.jp" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- contact 項目追加のみ -->
            <div class="mt-4">
                <x-input-label for="contact" :value="__('Contact')" />
                <x-text-input id="contact" class="block mt-1 w-full" type="number" name="contact"
                    placeholder="06-6374-0144" :value="old('contact')" required autofocus autocomplete="contact" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                placeholder="半角英数字8文字以上" required autocomplete="new-password" />

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
