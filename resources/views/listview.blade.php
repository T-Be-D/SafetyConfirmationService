<?php
// //status 0 × 1 〇
// $lists = [['studentID' => '0001 ', 'name' => '田中太郎', 'class' => 'SK2A', 'place' => '社内', 'status' => '1', 'message' => 'This is a message', 'contact' => '0000000'], ['studentID' => '0002 ', 'name' => '山田次郎', 'class' => 'SK2A', 'place' => '社内', 'status' => '0', 'message' => 'This is a message2', 'contact' => '11111111'], ['studentID' => '0003 ', 'name' => '森花子', 'class' => 'IE2A', 'place' => '社内', 'status' => '1', 'message' => 'This is a message3', 'contact' => '22222222'], ['studentID' => '0004 ', 'name' => '鈴木隼人', 'class' => 'IE2A', 'place' => '社内', 'status' => '0', 'message' => 'This is a message', 'contact' => '4444444']];
// //クラスの重複

// //ok &#9989;;
// //ng &#10060;



$item = [];
$int = 0;
foreach ($items as $i) {
    $item[$int++] = $i;
}

//クラスの重複対策
$classes = array();
$i = 0;
foreach ($class as $key => $value) {
    $classes[$i++] = $value["class"];
}
// print_r($classes);
$classes = array_unique($classes);
$message = '';
if ($message) {
    echo $message;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listview</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex flex-col  items-center  h-screen">
        <h1 class="text-4xl m-5">Listview</h1>

        {{-- search bar --}}
        <div class="my-5 flex">
            <form action="search" method="GET">
                <input type="text" class="seachWord" placeholder="search id or name..." name="nameID" />
                <select name="class" id="class">
                    <option value="">class</option>
                    @foreach ($classes as $cl)
                        <option value="{{ $cl }}">
                            {{ $cl }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1">安否
                <button id="" type="submit"
                    class="clear-results bg-blue-500 hover:bg-blue-700  text-white font-bold py-2 px-4 rounded"
                    onclick="search()">
                    SEARCH
                </button>

            </form>
            <form action="listview" >
                <button type="submit"
                    class="clear-results bg-blue-500 hover:bg-blue-700  text-white font-bold py-2 px-4 rounded"
                    onclick="reload()">
                    RELOAD
                </button>
            </form>

        </div>

        <table class="w-3/4 table-auto border-2 border-gray-600 " id="table">
            <thead class="border-2 border-gray-600 bg-gray-300 ">
                <tr id="th">
                    <th class="text-xl">STUDENTID </th>
                    <th class="text-xl">クラス </th>
                    <th class="text-xl">名前 </th>
                    <th class="text-xl">場所</th>
                    <th class="text-xl">メッセージ</th>
                    <th class="text-xl">連絡先</th>
                    <th class="text-xl">安全</th>
                </tr>
            </thead>

            @foreach ($items as $item)
                <tr>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $item->studentID }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $item->class }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $item->name }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $item->place }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $item->message }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $item->telnum }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">
                        @if($item->status == 1)
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
