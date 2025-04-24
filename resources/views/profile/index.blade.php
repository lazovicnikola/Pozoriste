<x-layout>
    <!-- Prikaz usera -->
    <x-slot:header>
        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} <br>
        <p class="text-xs text-gray-500">({{ auth()->user()->email }})</p>
    </x-slot:header>

    <!-- Kopmonenta navigacija -->
    <x-profile-nav></x-profile-nav>

    <!-- Sekcija za pjesme -->
    <div class="container mx-auto px-4 py-6">
        <div id="songs" class="space-y-4">
            @if ($songs->count() > 0)
            @foreach ($songs as $song)
            <a href="jobs/{{$song->id}}">
                <div class="bg-white p-5 rounded-lg shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 transform mb-3">
                    <div class="flex justify-between">
                        <div>
                            <span class="font-semibold text-gray-800 text-lg">{{ $song->title }}</span>
                            <span class="text-gray-600"> - </span>
                            <span class="text-gray-700">{{ $song->artist }}</span>
                        </div>
                        <span class="text-xs text-gray-500">{{ $song->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </a>
            @endforeach
            @else
            <p class="text-gray-500">No songs found.</p>
            @endif
        </div>

        <!-- Sekcija za userove playliste -->
        <div id="playlists" class="hidden space-y-4">
            @if ($playlists->count() > 0)
            @foreach ($playlists as $playlist)
            <a href="playlists/{{$playlist->id}}">
                <div class="bg-white p-5 rounded-lg shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 transform mb-3">
                    <div class="flex justify-between">
                        <div>
                            <span class="font-semibold text-gray-800 text-lg">{{ $playlist->name }}</span>
                        </div>
                        <span class="text-xs text-gray-500">{{ $playlist->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </a>
            @endforeach
            @else
            <p class="text-gray-500">No playlists found.</p>
            @endif
        </div>

        <!-- Sekcija za userove omiljene playliste -->
        <div id="favorites" class="hidden space-y-4">
            @if ($favorites->count() > 0)
            @foreach ($favorites as $favorite)
            <a href="playlists/{{$favorite->playlist->id }}">
                <div class="bg-white p-5 rounded-lg shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 transform mb-3">
                    <div class="flex justify-between">
                        <div>
                            <span class="font-semibold text-gray-800 text-lg">{{ $favorite->playlist->name }}</span>
                        </div>
                        <span class="text-xs text-gray-500">{{ $favorite->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </a>
            @endforeach
            @else
            <p class="text-gray-500">No favorites found.</p>
            @endif
        </div>
    </div>



    <script>
        document.getElementById('songs-btn').onclick = () => toggleSection('songs');
        document.getElementById('playlists-btn').onclick = () => toggleSection('playlists');
        document.getElementById('favorites-btn').onclick = () => toggleSection('favorites');

        function toggleSection(sectionId) {
            document.getElementById('songs').classList.add('hidden');
            document.getElementById('playlists').classList.add('hidden');
            document.getElementById('favorites').classList.add('hidden');

            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>

</x-layout>