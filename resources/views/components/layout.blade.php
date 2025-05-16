<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">



  <div class="min-h-full">
    <!-- Navbar -->
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <a href="/home" class="flex items-center">
              <img class="h-8 w-8" src="{{ asset('../img/logo.png') }}" alt="Your Company">
              <span class="ml-3 text-white text-lg font-semibold"><i>Podgoricko pozoriste</i></span>
            </a>
            <div class="hidden md:flex space-x-6 ml-10">
              <a href="/home" class="text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
              <a href="/shows" class="text-white  px-3 py-2 rounded-md text-sm font-medium">Reperotar</a>
            </div>
          </div>
          <div class="hidden md:flex items-center space-x-4">
            @guest
            <a href="/login" class="text-white  px-3 py-2 rounded-md text-sm font-medium">Log In</a>
            <a href="/register" class="text-white  px-3 py-2 rounded-md text-sm font-medium">Register</a>
            @endguest
            @auth
            <a href="/profile"
              class="inline-flex items-center gap-2 px-3 py-1.5 bg-white text-gray-700 rounded-full border border-gray-300 shadow-sm hover:bg-gray-100 transition-all duration-200">
              <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366F1&color=fff&rounded=true&size=32"
                alt="Profil"
                class="w-6 h-6 rounded-full">
              <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
            </a>

            <form action="/logout" method="POST" class="inline">
              @csrf
              <button type="submit" class="text-red-500  px-3 py-2 rounded-md text-sm font-medium">Log Out</button>
            </form>
            @endauth
          </div>
          <div class="md:hidden flex items-center">
            <button id="mobile-menu-button" class="text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div id="mobile-menu" class="hidden md:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <a href="/home" class="block text-gray-300 px-3 py-2 rounded-md text-base font-medium">Home</a>
          <a href="/shows" class="block text-gray-300 px-3 py-2 rounded-md text-base font-medium">Reperotar</a>
          <a href="/repertoar" class="block text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-base font-medium">Users List</a>
        </div>


        <!-- Authenticated User Links -->
        @auth
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100" alt="{{ auth()->user()->name }}">
            <div class="ml-3">
              <div class="text-base font-medium text-white">{{ auth()->user()->name }}</div>
              <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
            </div>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <a href="/profile" class="block text-gray-300 px-3 py-2 rounded-md text-base font-medium">Your Profile</a>
            <form action="/logout" method="POST" class="block">
              @csrf
              <button type="submit" class="w-full text-left text-red-500 px-3 py-2 rounded-md text-base font-medium">Log Out</button>
            </form>
          </div>
        </div>
        @endauth

        <!-- Guest Links -->
        @guest
        <div class="border-t border-gray-700 pb-3 pt-4">
          <a href="/login" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">Log In</a>
          <a href="/register" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">Register</a>
        </div>
        @endguest
      </div>
    </nav>


    <header class="bg-white shadow bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 text-gray-800">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:flex sm:items-center sm:justify-center sm:px-6 lg:px-8 ">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$header}}</h1>
      </div>
    </header>



    <!-- Main Content -->
    <main class="bg-gray-50">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{$slot}}
      </div>
    </main>
  </div>

  <footer class="bg-gray-800 text-white py-6">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
      <!-- Quick Links -->
      <div class="space-y-2 mb-4">
        <a href="/home" class="hover:text-blue-400">Home</a>
        <a href="/about" class="hover:text-blue-400">About Us</a>
        <a href="/contact" class="hover:text-blue-400">Contact</a>
      </div>

      <!-- Copyright -->
      <p class="text-sm">&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </div>
  </footer>


  <script>
    // Toggle mobile menu
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</body>

</html>