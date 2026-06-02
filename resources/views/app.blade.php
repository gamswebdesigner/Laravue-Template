<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @routes
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <x-inertia::head />
</head>

<body>
    <x-inertia::app />
</body>

</html>
