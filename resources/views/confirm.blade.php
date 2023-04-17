<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>安否確認</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-center items-center h-screen w-screen">
    <div class="h-2/4 w-2/4">
        <h1 class="text-teal-500 text-4xl">安否確認</h1>

        <form action="" class="flex flex-col justify-start items-start">

            <div class="flex">
                <h2 class=" px-2">名前</h2>
                <p>PlaceHolder Taro</p>
            </div>
            <div class="flex">
                <h2 class="px-2">学生</h2>
                <p>クラス SK2A</p>
            </div>

            <div>
                <label for="place">場所</label>
                <select name="place" id="">
                    <option value="defult"></option>
                    <option value="company">社内</option>
                    <option value="home">在宅</option>
                    <option value="etc">その他</option>
                </select>
                <label for="safe">安全</label>
                <input type="checkbox" name="safe">
            </div>
            <label for="textbox">メッセージ</label>
            <textarea id="textbox" name="textbox"
              rows="3" cols="33" class="mb-4">

            </textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">button</button>
        </form>

    </div>
</body>
</html>
