<?php

$lists = [['name' => 'Listview test1 ', 'place' => '社内', 'status' => '安全', 'message' => 'This is a message', 'contact' => '0000000'], ['name' => 'Listview test2 ', 'place' => '社内', 'status' => '安全', 'message' => 'This is a message2', 'contact' => '11111111'], ['name' => 'Listview test3 ', 'place' => '社内', 'status' => '安全', 'message' => 'This is a message3', 'contact' => '22222222']];

//ok &#9989;;
//ng &#10060;

?>

<!DOCTYPE html>
<html lang="en">

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
        <div class="my-5">
            {{-- <form class="form"> --}}
            <input id="seachWord" type="text" class="seachWord" placeholder="search..." />
            <button id=""
                class="clear-results bg-blue-500 hover:bg-blue-700  text-white font-bold py-2 px-4 rounded"
                onclick="search()">
                Btn
            </button>
            {{-- </form> --}}
            <p id="result"></p>
        </div>

        <table class="w-3/4 table-auto border-2 border-gray-600 " id="table">
            <thead class="border-2 border-gray-600 bg-gray-300 ">
                <tr>
                    <th class="text-xl">名前 </th>
                    <th class="text-xl">場所</th>
                    <th class="text-xl">メッセージ</th>
                    <th class="text-xl">連絡先</th>
                    <th class="text-xl">安全</th>
                </tr>
            </thead>

            @foreach ($lists as $l)
                <tr>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $l['name'] }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600 ">{{ $l['place'] }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $l['message'] }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600">{{ $l['contact'] }}</td>
                    <td class="text-center text-lg font-semibold border-b-2 border-gray-600"> &#10060;</td>
                </tr>
            @endforeach
        </table>
    </div>


</body>
<script>
    function search() {
        const table = document.getElementById("table");
        for (let row of table.rows) {
            for (let cell of row.cells) {
                if (document.getElementById("seachWord").value == cell.innerText) {

                    for (let thiscell of row.cells) {
                        document.getElementById('result').innerText += thiscell.innerText;
                    }

                }

            }
        }
    }
</script>

</html>
