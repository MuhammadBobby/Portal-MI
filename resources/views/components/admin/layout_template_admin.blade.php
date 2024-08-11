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
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
    {{-- script success --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    {{-- script error --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    {{-- script confirm delete --}}
    <script>
        function deleteConfirm(event) {
            event.preventDefault(); // Mencegah form dikirimkan langsung

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Temukan form terdekat yang berasosiasi dengan tombol yang diklik
                    const form = event.target.closest('form');
                    if (form) {
                        form.submit(); // Kirim form tersebut
                    }
                }
            });
        }
    </script>

</body>

</html>
