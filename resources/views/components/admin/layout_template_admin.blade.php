@props(['title', 'mini_title', 'href', 'action'])


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- mycss --}}
    <link rel="stylesheet" href="/css/admin.css">
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- boxicons --}}
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    {{-- preload --}}
    <x-admin.preload />

    {{-- sidebar --}}
    <x-admin.sidebar />

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <x-admin.navbar />
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            {{-- header --}}
            <x-admin.header mini_title="{{ $mini_title }}" href="{{ $href }}"
                action="{{ isset($action) ? $action : null }}" />

            {{ $slot }}
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="/js/admin.js"></script>
</body>

</html>
