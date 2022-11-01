<html lang="en">
<head>
    <title>Todo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
</head>
<body>
{{ $slot }}
    @livewireStyles
</body>
</html>
