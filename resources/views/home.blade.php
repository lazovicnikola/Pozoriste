<x-layout>
    <x-slot:header>
        <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-white tracking-tight uppercase">Pozorište</h1>
    </x-slot:header>

    <div class="max-w-6xl mx-auto p-8">
        <h2 class="text-2xl font-bold mb-4">Najnovije predstave</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            @foreach ($latestShows as $show)
            <div class="relative rounded-lg overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
                <img src="{{ asset("storage/{$show->image_path}") }}" class="w-full h-60 object-cover" alt="{{ $show->title }}">

                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent text-white p-3">
                    <h3 class="text-sm sm:text-base font-semibold uppercase">{{ $show->title }}</h3>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4 text-right">
            <a href="{{ route('shows') }}" class="text-blue-600 hover:underline text-sm font-medium">Pogledaj sve predstave 🡆</a>
        </div>
    </div>



    <div class="max-w-6xl mx-auto p-8">
        <h2 class="text-2xl font-bold mb-4">Najpopularnije predstave</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            @foreach ($topShows as $show)
            <div class="relative rounded-lg overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
                <img src="{{ asset("storage/{$show->show->image_path}") }}"
                    alt="{{ $show->show->title }}"
                    class="w-full h-60 object-cover">

                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent text-white p-3 text-sm">
                    <h3 class="font-semibold text-base">{{ $show->show->title }}</h3>
                    <p>📅 {{ $show->date }} | 🕒 {{ $show->start_time }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4 text-right">
            <a href="{{ route('shows') }}" class="text-blue-600 hover:underline text-sm font-medium">Pogledaj sve predstave 🡆</a>
        </div>
    </div>



</x-layout>