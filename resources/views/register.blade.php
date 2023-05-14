<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex space-x-5">
            <!-- Student_id 項目追加のみ-->
            <div>
                <x-input-label for="student_id" :value="__('Student_ID')" />
                <x-text-input id="student_id" class="block mt-1 w-50" type="number" name="student_id" :value="old('student_id')"
                    autofocus autocomplete="student_id" />
                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>

            <!-- Class 項目追加のみ-->
            {{-- <div>
                <x-input-label for="class" :value="__('Class')" />
                <x-text-input id="class" class="block mt-1 w-50" type="text" name="class" :value="old('class')"
                    required autofocus autocomplete="class" />
                <x-input-error :messages="$errors->get('class')" class="mt-2" />
            </div> --}}

            <div class="text-sm ">
                <x-input-label for="class" :value="__('Class')" />
                <div class="flex gap-1 py-1 ">

                    <input type="radio" id="it_radio" name="category" value="IT" checked>
                    <label for="it_radio">IT</label>


                    <input type="radio" id="game_radio" name="category" value="">
                    <label for="game_radio">ゲーム</label>


                    <input type="radio" id="other_radio" name="category" value="other">
                    <label for="other_radio">その他</label>

                </div>
                <div class="flex gap-2">
                    <select id="class_type" name="class_type"
                        class="block mt-1 w-50 rounded dark:bg-gray-700 dark:text-white " required autofocus
                        autocomplete="class_type">
                        <option value="IE">IE</option>
                        <option value="SK">SK</option>
                        <option value="teacher">教員</option>
                    </select>
                    <select id="class" name="class"
                        class="block mt-1 w-50 rounded dark:bg-gray-700 dark:text-white" required autofocus
                        autocomplete="class">
                    </select>
                </div>
                <x-input-error :messages="$errors->get('class')" class="mt-2" />
            </div>
        </div>

        <script>
            const classTypeSelect = document.getElementById('class_type');
            const classSelect = document.getElementById('class');

            const classOptions = {
                IT: [{
                        value: 'IE',
                        label: 'IE'
                    },
                    {
                        value: 'SK',
                        label: 'SK'
                    },
                ],
                GAME: [{
                    value: 'GE',
                    label: 'GE'
                }, ],

                other: [{
                    value: 'teacher',
                    label: '教員'
                }, {
                    value: 'high',
                    label: '高校'
                }, ],
            };

            // Update the options in the class_type select element
            function updateClassTypeOptions() {
                const selectedCategory = document.querySelector('input[name="category"]:checked').value;
                const options = classOptions[selectedCategory];

                // Clear current options
                classTypeSelect.innerHTML = '';

                // Add new options
                options.forEach(option => {
                    const {
                        value,
                        label
                    } = option;
                    const optionElement = document.createElement('option');
                    optionElement.value = value;
                    optionElement.textContent = label;
                    classTypeSelect.appendChild(optionElement);
                });

                // Trigger the change event to update the class select options
                classTypeSelect.dispatchEvent(new Event('change'));
            }

            // Add event listener for category radio buttons
            const categoryRadios = document.querySelectorAll('input[name="category"]');
            categoryRadios.forEach(radio => {
                radio.addEventListener('change', updateClassTypeOptions);
            });

            // Initialize the class_type options
            updateClassTypeOptions();

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

            const classOptionsIE = [{
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
                },
            ];

            const classOptionsSK = [{
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
                },
            ];

            const classOptionsGE = [{
                    value: 'GE1A',
                    label: 'GE1A'
                },
                {
                    value: 'GE1B',
                    label: 'GE1B'
                },
                {
                    value: 'GE1C',
                    label: 'GE1C'
                },
                {
                    value: 'GE2A',
                    label: 'GE2A'
                },
                {
                    value: 'GE2B',
                    label: 'GE2B'
                },
                {
                    value: 'GE2C',
                    label: 'GE2C'
                },
                {
                    value: 'GE3A',
                    label: 'GE3A'
                },
                {
                    value: 'GE3B',
                    label: 'GE3B'
                },
                {
                    value: 'GE3C',
                    label: 'GE3C'
                },
                {
                    value: 'GE4A',
                    label: 'GE4A'
                },
                {
                    value: 'GE4B',
                    label: 'GE4B'
                },
                {
                    value: 'GE4C',
                    label: 'GE4C'
                },

            ];



            const classOptionsOther = [{
                    value: '校長',
                    label: '校長'
                },
                {
                    value: '教頭',
                    label: '教頭'
                },
                {
                    value: '講師',
                    label: '講師'
                },
            ];

            const classOptionshigh = [{
                    value: 'HG1A',
                    label: 'HG1A'
                },
                {
                    value: 'HG2A',
                    label: 'HG2A'
                },
                {
                    value: 'HG3A',
                    label: 'HG3A'
                },
                {
                    value: 'HC1A',
                    label: 'HC1A'
                },
                {
                    value: 'HC2A',
                    label: 'HC2A'
                },
                {
                    value: 'HC3A',
                    label: 'HC3A'
                },

            ];



            function updateClassOptions() {
                const selectedClassType = classTypeSelect.value;

                if (selectedClassType === 'IE') {
                    // Clear current options
                    classSelect.innerHTML = '';

                    // Add new options for IE
                    classOptionsIE.forEach(option => {
                        const {
                            value,
                            label
                        } = option;
                        const optionElement = document.createElement('option');
                        optionElement.value = value;
                        optionElement.textContent = label;
                        classSelect.appendChild(optionElement);
                    });
                } else if (selectedClassType === 'SK') {
                    // Clear current options
                    classSelect.innerHTML = '';

                    // Add new options for IE
                    classOptionsSK.forEach(option => {
                        const {
                            value,
                            label
                        } = option;
                        const optionElement = document.createElement('option');
                        optionElement.value = value;
                        optionElement.textContent = label;
                        classSelect.appendChild(optionElement);
                    });
                } else if (selectedClassType === 'GE') {
                    // Clear current options
                    classSelect.innerHTML = '';

                    // Add new options for IE
                    classOptionsGE.forEach(option => {
                        const {
                            value,
                            label
                        } = option;
                        const optionElement = document.createElement('option');
                        optionElement.value = value;
                        optionElement.textContent = label;
                        classSelect.appendChild(optionElement);
                    });

                } else if (selectedClassType === 'teacher') {
                    // Clear current options
                    classSelect.innerHTML = '';

                    // Add new options for IE
                    classOptionsOther.forEach(option => {
                        const {
                            value,
                            label
                        } = option;
                        const optionElement = document.createElement('option');
                        optionElement.value = value;
                        optionElement.textContent = label;
                        classSelect.appendChild(optionElement);
                    });

                } else if (selectedClassType === 'high') {
                    // Clear current options
                    classSelect.innerHTML = '';

                    // Add new options for IE
                    classOptionshigh.forEach(option => {
                        const {
                            value,
                            label
                        } = option;
                        const optionElement = document.createElement('option');
                        optionElement.value = value;
                        optionElement.textContent = label;
                        classSelect.appendChild(optionElement);
                    });


                } else {
                    // Clear current options
                    classSelect.innerHTML = '';

                    // Add new options based on selected class type
                    const options = classOptions[selectedClassType];
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
            }

            // Add event listener for class type select
            classTypeSelect.addEventListener('change', updateClassOptions);

            // Initialize the class options
            updateClassOptions();
        </script>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="田中 太郎"
                :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex space-x-5">

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    placeholder="ecc123@ecc.ac.jp" :value="old('email')" autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- contact 項目追加のみ -->
            <div class="mt-4">
                <x-input-label for="contact" :value="__('Contact')" />
                <x-text-input id="contact" class="block mt-1 w-full" type="number" name="contact"
                    placeholder="06-6374-0144" :value="old('contact')" autofocus autocomplete="contact" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                placeholder="半角英数字8文字以上" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" autocomplete="new-password" />

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
