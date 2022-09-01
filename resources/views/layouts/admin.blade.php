<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie - {{ $title }}</title>

    <x-style></x-style>
    @stack('style')

</head>

<body>
    <div id="app">

        <x-sidebar>{{$title}}</x-sidebar>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <x-footer></x-footer>

        </div>
    </div>

    <x-script></x-script>
    @stack('script')

</body>

</html>