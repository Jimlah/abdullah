<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased" x-data>
<div class="h-screen w-full flex flex-col items-center justify-center">
    <div x-data x-datatable='/users?' class="flex items-center flex-col">
       <div>
           <input x-datatable:search class="border"/>
           <input x-datatable:filter="'user'" class="border">
           <input x-datatable:filter="'last'" class="border">
           <select x-datatable:perpage>
               <option value="10">10</option>
               <option value="15">15</option>
               <option value="20">20</option>
               <option value="25">25</option>
           </select>
           <div>
               <template x-datatable:columns.list >
                   <label>
                       <span x-text='key'></span>
                       <input type="checkbox" x-model="columns[key]" />
                   </label>
               </template>
           </div>
           <span x-datatable:currentpage ></span>
       </div>
        <table>
            <thead x-datatable:header>
            <tr>
                <th x-datatable:header.column>Name</th>
                <th x-datatable:header.column>Email</th>
                <th x-datatable:header.column>Created At</th>
            </tr>
            </thead>
            <tbody >
            <template x-datatable:items="data?.data">
                <tr>
                    <td  x-show="columns[$el.cellIndex]" x-text="item.name"></td>
                    <td x-show="columns[$el.cellIndex]" x-text="item.email"></td>
                    <td x-show="columns[$el.cellIndex]" x-text="item.created_at"></td>
                </tr>
            </template>
            </tbody>
        </table>
        <div>
            <button class="p-2" x-datatable:prev>Prev</button>
            <template x-datatable:items="data?.last_page">
                <button class="p-2" x-on:click="setPageNumber(item)" x-text="item"></button>
            </template>
            <button class="p-2" x-datatable:next>Next</button>
        </div>
    </div>
</div>
</body>
</html>
