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
<div class="h-screen w-full flex flex-col items-center justify-center" >
    <button class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm tracking-wide rounded hover:bg-blue-800" x-modal:button.1>
        Button
    </button>
    <div class="p-6 bg-white shadow-2xl bg-center rounded-md" x-modal:body.1 >
        Modal
    </div>
</div>
</body>
</html>
