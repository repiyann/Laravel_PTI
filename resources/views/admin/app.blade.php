<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin Dashboard </title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('../assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="{{ asset('../assets/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('./assets/js/charts-bars.js') }}" defer></script>
    <script src="{{ asset('./assets/js/focus-trap.js') }}" defer></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- SideBar -->
        @include('layouts/adminSidebar')
        <!-- SideBar End -->
        <div class="flex flex-col flex-1 w-full">
            <!-- NavBar -->
            @include('layouts/adminNavbar')
            <!-- NavBar End -->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('./assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('./assets/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#rupiah').mask("#.##0", {
                reverse: true
            });
        });
    </script>
</body>

</html>