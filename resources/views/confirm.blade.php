<?php
$user = auth()->user();

print_r($user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>安否確認</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col  items-center justify-center h-screen">
    <div class="border-2 border-gray-600 pt-4 px-8 pb-4 rounded-lg w-auto flex flex-col  items-center">
        <h1 class="font-bold text-4xl text-center mb-4">安否確認</h1>

        <form action="" class="flex flex-col justify-start items-start">

            <div class="flex">
                <h2 class=" px-5 text-2xl font-semibold">名前</h2>
                <p class="text-2xl font-semibold">PlaceHolder </p>
            </div>
            <div class="flex">
                <h2 class="px-5 text-2xl font-semibold">学生</h2>
                <p class="text-2xl font-semibold">クラス SK2A</p>
            </div>

            <div class="my-5 px-3">
                <label for="place" class="text-2xl font-semibold mr-2">場所</label>
                <select name="place" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 mr-2">
                    <option value="defult"></option>
                    <option value="company">社内</option>
                    <option value="home">在宅</option>
                    <option value="etc">その他</option>
                </select>
                <label for="safe" class="text-2xl font-semibold mr-2">安全</label>
                <input type="checkbox" name="safe"
                    class="w-5 h-5 text-blue-600 bg-gray-50 border-gray-300 rounded focus:ring-blue-500">
            </div>
            <label for="textbox" class="text-xl font-bold mt-5 mb-2">メッセージ</label>
            <textarea id="textbox" name="textbox" rows="3" cols="35"
                class="w-full px-0 mb-5 text-m text-gray-900 bg-white border focus:ring-blue-500 rounded-lg">

            </textarea>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xl py-2 px-4 rounded h-10 w-28">更新</button>
        </form>

    </div>
</body>

</html>
