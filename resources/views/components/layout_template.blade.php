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
     {{-- sweetalert2 --}}
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 </head>

 <body class="overflow-x-hidden bg-orange-50 font-urbanist">
     <x-navbar />
     {{ $slot }}
     <x-footer />

     <script src="/js/script.js"></script>
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
 </body>

 </html>
