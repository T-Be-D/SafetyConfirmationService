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
                    <input type="radio" id="ie" name="class_type" value="IE" checked>
                    <label for="ie" style="font-size: 16px; color: rgb(11, 10, 10)">IE</label>
                    <input type="radio" id="sk" name="class_type" value="SK">
                    <label for="sk" style="font-size: 16px; color:rgb(11, 10, 10)">SK</label>
                    <input type="radio" id="teacher" name="class_type" value="teacher">
                    <label for="sk" style="font-size: 16px; color: rgb(11, 10, 10)">教員</label>

                </div>
                <select id="class" name="class" class="block mt-1 w-50 rounded " required autofocus
                    autocomplete="class" style="background-color: white;" required>
                    {{-- 教員 --}}
                    <option value="校長">校長</option>
                    <option value="教頭">教頭</option>
                    <option value="教員">教員</option>
                    {{-- IE --}}
                    <option value="IE1A">IE1A</option>
                    <option value="IE1B">IE1B</option>
                    <option value="IE2A">IE2A</option>
                    <option value="IE2B">IE2B</option>
                    <option value="IE3A">IE3A</option>
                    <option value="IE3B">IE3B</option>

                    {{-- SK --}}
                    <option value="SK1A">SK1A</option>
                    <option value="SK1B">SK1B</option>
                    <option value="SK2A">SK2A</option>
                    <option value="SK2B">SK2B</option>
                    <option value="SK3A">SK3A</option>
                    <option value="SK3B">SK3B</option>


                </select>
                <x-input-error :messages="$errors->get('class')" class="mt-2" />
            </div>

            <script>
                // ラジオボタンの選択状態に応じてselectの中身を変更する関数
                function updateClassOptions() {
                    const classType = document.querySelector('input[name="class_type"]:checked').value;
                    const classSelect = document.getElementById('class');
                    if (classType === 'IE') {
                        classSelect.innerHTML = `
                <option value=""selected hidden>選択</option>
                <option value="IE1A">IE1A</option>
                <option value="IE1A">IE1B</option>
                <option value="IE2A">IE2A</option>
                <option value="IE2B">IE2B</option>
                <option value="IE3A">IE3A</option>
                <option value="IE3B">IE3B</option>

            `;
                    } else if (classType === 'SK') {
                        classSelect.innerHTML = `
                <option value=""selected hidden>選択</option>
                <option value="SK1A">SK1A</option>
                <option value="SK1A">SK1B</option>
                <option value="SK2A">SK2A</option>
                <option value="SK2B">SK2B</option>
                <option value="SK3A">SK3A</option>
                <option value="SK3B">SK3B</option>

            `;
                    } else if (classType === 'teacher') {
                        classSelect.innerHTML = `
                <option value=""selected hidden>選択</option>
                <option value="校長">校長</option>
                <option value="教頭">教頭</option>
                <option value="教員">教員</option>
            `;
                    }

                }
                // ラジオボタンの選択状態が変更された時にselectの中身を変更するように設定する
                document.querySelectorAll('input[name="class_type"]').forEach(radio => {
                    radio.addEventListener('change', updateClassOptions);
                });
                // 初期化時にもselectの中身を変更する
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
