<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="overflow-x-hidden bg-orange-50 font-urbanist">
    <x-navbar />

    <x-landingPage.jumbotron />
    <x-landingPage.top />
    <x-landingPage.parallax />
    <x-landingPage.news />
    <x-landingPage.category />
    <x-landingPage.contact />

    <x-footer />

    <script src="/js/navbar.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>
