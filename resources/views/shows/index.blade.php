<x-layout>
    <x-slot:header>
        <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-white tracking-tight uppercase">
            Repertoar
        </h1>
    </x-slot:header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
        @can('admin')
        <div class="flex flex-wrap justify-between items-center gap-4 mt-6">
            <a href="/shows/create"
                class="px-6 py-3 bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white text-sm font-bold rounded-full shadow hover:scale-105 transition-transform duration-300">
                ➕ Dodaj novu predstavu
            </a>
            <form action="{{ route('shows') }}" method="GET" class="flex items-center gap-3">
                <input type="text" name="search" placeholder="Pretraga predstava..."
                    class="px-5 py-2 rounded-full bg-white border border-gray-300 text-gray-700 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-300">
                <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white text-sm font-bold rounded-full shadow hover:scale-105 transition-transform duration-300">
                    🔍 Pretraži
                </button>
            </form>
        </div>
        @endcan

        @if($shows->count() == 0)
        <div class="flex justify-center items-center py-16">
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Trenutno nema predstava.
                @can('admin')
                <a href="{{ route('shows.create') }}" class="text-pink-500 hover:underline">Dodaj predstavu</a>
                @endcan
            </p>
        </div>
        @else
        @cannot('admin')
        <div class="flex flex-wrap justify-between items-center gap-4 mt-6">

            <form action="{{ route('shows') }}" method="GET" class="flex items-center gap-3 flex-wrap">
                <select name="sort"
                    class="px-5 py-2 bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white text-sm font-bold rounded-full shadow focus:outline-none hover:scale-105 transition-transform duration-300">
                    <option value="">Sortiraj po datumu</option>
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }} class="text-grey-100">Najpopularnije</option>
                </select>

                <button type="submit"
                    class="px-5 py-2 bg-purple-700 text-white text-sm font-bold rounded-full shadow hover:scale-105 transition-transform duration-300">
                    Filtriraj
                </button>
            </form>


            <form action="{{ route('shows') }}" method="GET" class="flex items-center gap-3">
                <input type="text" name="search" placeholder="Pretraga predstava..."
                    class="px-5 py-2 rounded-full bg-white border border-gray-300 text-gray-700 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-300">
                <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white text-sm font-bold rounded-full shadow hover:scale-105 transition-transform duration-300">
                    🔍 Pretraži
                </button>
            </form>
        </div>


        @endcannot
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($shows as $show)
            <div class="bg-gray-300 border-2 border-gray-400 text-gray-900 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition transform hover:-translate-y-1">

                <img src="{{ asset("storage/{$show->show->image_path}") }}"
                    alt="Poster za {{ $show->show->title }}"
                    class="w-full h-56 object-cover">

                <div class="p-6 space-y-3">
                    <h3 class="text-2xl font-bold">{{ $show->show->title }}</h3>
                    <p class="text-sm text-gray-900">
                        📅 <span class="font-medium">{{ $show->date }}</span><br>
                        🕒 <span class="font-medium">{{ $show->start_time }}</span><br>
                        📍 <span class="font-medium">{{ $show->hall->name }}</span>
                    </p>
                    <div class="pt-4">
                        <a href="{{ route('shows.show', $show->show->id) }}"
                            class="inline-block w-full text-center px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow">
                            🎟️ Rezerviši ulaznice
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pt-12">
            {{ $shows->links() }}
        </div>
        @endif
    </div>
</x-layout>