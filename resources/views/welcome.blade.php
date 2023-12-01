<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTFF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> KFC </title>

    <!-- Stylesheet -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('../assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('../assets/js/init-alpine.js') }}"></script>
</head>

<body>
    @auth
    @if (Auth::user()->role == 'admin') <!-- tidak akan bisa kembali ke landing page dan akan dibawa paksa ke halaman dashboard sesuai role masing-masing -->
    <script type="text/javascript">
        window.location = "{{ url('/admin/dashboard') }}";
    </script>
    @elseif (Auth::user()->role == 'user')
    <script type="text/javascript">
        window.location = "{{ url('/user/dashboard') }}";
    </script>
    @endif
    @endauth
    <header class="w-full z-10 shadow-md fixed bg-white dark:bg-gray-800">
        <nav class="flex justify-between items-center px-32 py-3">
            <a href="/" class="text-3xl font-semibold dark:text-white">
                <i class="fa-solid fa-drumstick-bite" style="color: #9333ea;"></i>
                Kilat Friend Chicken
            </a>
            <ul class="flex items-center">
                <li class="block py-2 pr-6">
                    <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                        <template x-if="dark">
                            <svg class="w-5 h-5" aria-hidden="true" fill="white" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </template>
                        <template x-if="!dark">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                            </svg>
                        </template>
                    </button>
                </li>
                <li class="block py-2 pr-6">
                    <a href="#" class="text-lg hover:text-[#9333ea] dark:text-white dark:hover:text-dark">
                        Menu
                    </a>
                </li>
                <li class="block py-2 pr-6">
                    <a href="#about" class="text-lg hover:text-[#9333ea] dark:text-white dark:hover:text-dark">
                        Tentang Kami
                    </a>
                </li>
                <li class="block py-2 pr-10">
                    @if (Route::has('register'))
                    <a href="{{ route('register')}}" class="bg-[#9333ea] text-white text-lg border-white rounded-xl px-3 py-2 hover:bg-[#4c1b7a]">
                        Register
                    </a>
                    @endif
                </li>
            </ul>
        </nav>
    </header>

    <div class="bg-white dark:bg-gray-800">
        <section id="home">
            <div class="hero bg-white dark:bg-gray-800">
                <div class="grid grid-cols-2 gap-10 pb-20">
                    <div class="col-start-1 col-end-1 m-auto">
                        <h1 class="text-4xl mb-5 dark:text-white">
                            Kilat Fried Chicken — pesan makanan secepat kilat!
                        </h1>
                        @if (Route::has('register'))
                        <a href="{{ route('register')}}" class="bg-[#9333ea] text-white text-lg border-white rounded-xl px-2 py-2 hover:bg-[#4c1b7a]">
                            Beli Sekarang
                        </a>
                        @endif
                    </div>
                    <div class="col-start-2 col-end-2">
                        <img src="{{ asset('assets/img/home-image.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="about">
            <div class="about bg-white dark:bg-gray-800">
                <div class="grid grid-cols-2 gap-10 mt-20 pt-20">
                    <div class="col-start-1 col-end-1 mt-5">
                        <img src="{{ asset('assets/img/about-image.svg') }}" alt="">
                    </div>
                    <div class="col-start-2 col-end-2 m-auto">
                        <h1 class="text-4xl mb-5 font-semibold dark:text-white">
                            Tentang Kami
                        </h1>
                        <h3 class="text-2xl mb-2 font-semibold dark:text-white">
                            Kenapa Memilih Kami?
                        </h3>
                        <div class="text-justify">
                            <p class="mb-1 dark:text-white">
                                Kami adalah restoran yang menyediakan menu makanan
                                ayam, restoran kami sudah terjamin bersih, halal
                                dan higienis.
                            </p>
                            <p class="dark:text-white">
                                Kami membantu anda dalam memesan makanan agar tidak
                                repot menunggu di kasir sehingga saat anda datang,
                                makanan sudah siap saji tanpa perlu menunggu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts/footer')
    </div>
</body>

</html>