<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>安否確認</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col items-center justify-center h-screen bg-gray-100">

    <div class="border-2 border-gray-600 pt-4 px-8 pb-4 rounded-lg w-auto flex flex-col  items-center bg-white">
        <h1 class="font-bold text-4xl text-center mb-4">安否確認</h1>

        {{-- form --}}
        <form method="POST" action="{{ 'makepost' }}" class="flex flex-col justify-start items-start">
            @csrf
            <div class="flex">
                <h2 class="px-5 text-2xl font-semibold">クラス : {{ $user->class }}</h2>
                <p class="px-5 text-2xl font-semibold">ID : {{ $user->studentID }}</p>
            </div>
            <div class="flex">
                <h2 class=" px-5 text-2xl font-semibold">名前 : {{ $user->name }}</h2>
            </div>

            <div class="my-1 px-5">
                <label for="place" class="text-2xl font-semibold mr-2">現在地</label>
                <select name="place" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 mr-2"
                    required>
                    <option value=""selected hidden>未設定</option>
                    <option value="学内">学内</option>
                    <option value="在宅">在宅</option>
                    <option value="その他">その他</option>
                </select>
                <label for="safe" class="text-2xl font-semibold mr-2">安全</label>
                <input type="checkbox" name="safe"
                    class="w-7 h-7 text-blue-600 bg-gray-50 border-gray-300 rounded focus:ring-blue-500">
            </div>
            <label for="textbox" class="text-xl font-bold mt-5 mb-2">メッセージ</label>
            <textarea id="textbox" name="textbox" rows="4" cols="35"
                class="w-full px-0 mb-2 text-gray-900 bg-white border focus:ring-blue-500 rounded-lg">
            </textarea>
            <button type="submit"
                class="bg-black hover:bg-black-700 text-white font-bold text-xl py-2 px-4 rounded h-10 w-28 mx-auto mt-2 hover:shadow-sm hover:translate-y-0.5 transform transition">更新</button>
        </form>

    </div>
</body>

</html>
