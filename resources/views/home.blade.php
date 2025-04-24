<x-layout>
    <x-slot:header>
        <h1 class="text-4xl font-bold text-center text-gray-800">Crnogorsko narodno pozoriste</h1>
    </x-slot:header>

   
    <!-- <div class="relative w-full max-w-6xl mx-auto overflow-x-auto whitespace-nowrap mt-8 scrollbar-hide">
        <div class="flex gap-4">
            <img src="https://th.bing.com/th/id/R.178324a00644f6c24498fe6af48f823f?rik=FyRMEjedAQo27w&riu=http%3a%2f%2fwww.progarchives.com%2fprogressive_rock_discography_covers%2f1470%2fcover_332418182009.JPG&ehk=Y12s10vIbnUubyxsjwastAadTHsJJ9JysSCF1h%2bXtKU%3d&risl=&pid=ImgRaw&r=0" alt="Song 1" class="h-80 object-cover">
            <img src="https://img.discogs.com/X2BNkTp3gtF3JzPJ0E-_PU4fxsE=/600x842/smart/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/A-1126077-1436539748-4225.jpeg.jpg" alt="Song 2" class="h-80 object-cover">
            <img src="https://i.scdn.co/image/ab67616d0000b273cf2f4512bc8f482a556d729e" alt="Song 3" class="h-80 object-cover">
            <img src="https://e00-telva.uecdn.es/assets/multimedia/imagenes/2019/04/29/15565524245594.jpg" alt="Song 4" class="h-80 object-cover">
            <img src="https://th.bing.com/th/id/OIP.x_xnU0-BEOQ62NUySfEroQAAAA?rs=1&pid=ImgDetMain" alt="Song 5" class="h-80 object-cover">
            <img src="https://img.discogs.com/GSIxLxPCDWHNJNlr2Uz3E1B6XH8=/fit-in/581x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-619728-1258225055.jpeg.jpg" alt="Song 6" class="h-80 object-cover">
            <img src="https://th.bing.com/th/id/R.f216c76745a49bf8ac264835f272f7ac?rik=solkg4zCdDyqIQ&riu=http%3a%2f%2fwww.progarchives.com%2fprogressive_rock_discography_covers%2f2877%2fcover_3326131552009.jpg&ehk=CXAoX0D4n67MwXFJ3kDdR1C52Rr%2bFUdqYV3Lixf%2bJfc%3d&risl=&pid=ImgRaw&r=0" alt="Song 7" class="h-80 object-cover">
            <img src="https://th.bing.com/th/id/OIP.6Dnh1eALu2YwpY-7IUjDjAHaHa?rs=1&pid=ImgDetMain" alt="Song 8" class="h-80 object-cover">
        </div>
    </div> -->

<!-- Sekcija sa top 5 predstava -->
<div class="max-w-6xl mx-auto p-8">
    <!-- <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Top 5 Predstava</h2> -->

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
        @foreach ($topShows as $show)
        <div class="relative bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
            <img src="{{ asset("storage/{$show->image_path}") }}" 
                 alt="{{ $show->title }}" 
                 class="w-full h-60 object-cover">

            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-900">{{ $show->title }}</h3>
                <p class="text-gray-600 text-sm">📅 {{ $show->date }}</p>
                <p class="text-gray-600 text-sm">🕒 {{ $show->start_time }}</p>

                <div class="mt-3">
                    <a href="{{ route('shows.show', $show->id) }}" 
                       class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">
                        Više informacija
                    </a>
                </div>
            </div>

            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-50 transition duration-300"></div>
        </div>
        @endforeach
    </div>
</div>

    
</x-layout>
