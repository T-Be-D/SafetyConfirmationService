<?php
// //status 0 × 1 〇
// //ok &#9989;;
// //ng &#10060;

$item = [];
$int = 0;
foreach ($items as $i) {
    $item[$int++] = $i;
}

//クラスの重複対策
$classes = [];
$i = 0;
foreach ($class as $key => $value) {
    $classes[$i++] = $value['class'];
}
// print_r($classes);
$classes = array_unique($classes);

// if (!empty($message)) {
//     echo $message;
// }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>災害掲示板</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex flex-col  items-center  h-screen bg-gray-100 dark:bg-gray-900 shadow">
        <div
            class=" flex  w-full justify-end space-x-2 bg-black text-white border-b-2  border-white dark: text-xl py-2 px-4 gap-2">

            <div class="py-1 font-bold border-b-2">ユーザー：{{ Auth::user()->name }}</div>

            <div class="border border-white rounded py-1 px-4 "><a href={{ route('confirm') }}>Edit</a>
            </div>
            <div class="border border-white rounded py-1 px-2 ">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>

        </div>
        <h1 class="text-4xl m-5 font-bold underline text-shadow-2xl dark:text-white">災害掲示板</h1>

        {{-- search bar --}}
        <div class="my-5 flex">
            <form action="search" method="GET">
                <input type="text" class="seachWord rounded dark:bg-gray-700 dark:text-white" placeholder="search id or name..." name="nameID" />
                <select name="class" id="class" class="rounded dark:bg-gray-700 dark:text-white">
                    <option value=""selected hidden >class</option>
                    @foreach ($classes as $cl)
                        <option value="{{ $cl }}" class="dark:bg-gray-700 dark:text-white">
                            {{ $cl }}
                        </option>
                    @endforeach
                </select>
                <select name="status" class="rounded dark:bg-gray-700 dark:text-white">
                    <option value=""selected hidden class="dark:bg-gray-700 dark:text-white">安否</option>
                    <option value="1" class="dark:bg-gray-700 dark:text-white">危険</option>
                    <option value="2" class="dark:bg-gray-700 dark:text-white">安全</option>
                </select>

                <button id="" type="submit"
                    class="clear-results dark:bg-white dark:text-black dark:hover:bg-white bg-black hover:bg-black text-white font-bold py-2 px-4 rounded hover:shadow-sm hover:translate-y-0.5 transform transition"
                    onclick="search()">
                    SEARCH
                </button>

            </form>
            <form action="listview">
                <button type="submit"
                    class="clear-results dark:bg-white dark:text-black dark:hover:bg-white bg-black hover:bg-black text-white font-bold py-2 px-4 ml-1 rounded hover:shadow-sm hover:translate-y-0.5 transform transition"
                    onclick="reload()">
                    CLEAR
                </button>
            </form>

        </div>

        <table class="w-3/4 table-auto border-2 border-black bg-white dark:bg-gray-800 dark:text-white dark:border-gray-600" id="table">
            <thead class="border-2 border-black bg-black  dark:bg-gray-800 dark:text-white dark:border-gray-600">
                <tr id="th" class="text-white">
                    <th class="text-xl">学籍番号 </th>
                    <th class="text-xl">クラス </th>
                    <th class="text-xl">名前 </th>
                    <th class="text-xl">場所</th>
                    <th class="text-xl">メッセージ</th>
                    <th class="text-xl">連絡先</th>
                    <th class="text-xl">安全</th>
                </tr>
            </thead>

            @foreach ($items as $item)
                <?php
                //電話番号

                $formatted_number = substr($item->telnum, 0, 3) . '-' . substr($item->telnum, 3, 4) . '-' . substr($item->telnum, 7);

                ?>
                <tr>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">{{ $item->studentID }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">{{ $item->class }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">{{ $item->name }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">{{ $item->place }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">{{ $item->message }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">{{ $formatted_number }}
                    </td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">
                        @if ($item->status == 1)
                            &#9989;
                        @else
                            &#10060;
                        @endif
                    </td>

                </tr>
            @endforeach
        </table>

    </div>


</body>

</html>
