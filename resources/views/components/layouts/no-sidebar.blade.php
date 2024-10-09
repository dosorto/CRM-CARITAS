<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>EXODO</title>
</head>

<body class="bg-gray-900">

    <div class="dark size-full">
        <div class="p-6 m-4 border-gray-200 rounded-lg dark:border-gray-600">
            {{ $slot }}
        </div>
    </div>

    @livewire('wire-elements-modal')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
