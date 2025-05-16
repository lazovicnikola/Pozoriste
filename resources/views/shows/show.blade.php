<x-layout>
  <x-slot:header>
    <div class="text-center">
      <h1 class="text-5xl font-extrabold tracking-tight uppercase">{{ $show->title }}</h1>
      <p class="text-sm mt-3 text-[#ee4674] tracking-wide">Režiser: {{ $show->director }} | Objavio: {{ $show->user->name }}</p>
    </div>
  </x-slot:header>

  <section class="grid grid-cols-1 md:grid-cols-2 bg-[#f3f4f6] text-[#1f2937] py-16 px-4 md:px-12 gap-12">

  <div class="relative">
    <img src="{{ asset("storage/{$show->image_path}") }}"
         alt="Slika predstave"
         class="rounded-lg w-full h-auto max-h-[500px] object-cover object-top">
    
    <div class="absolute bottom-4 left-4 bg-[#ee4674] text-white text-xs px-3 py-1 uppercase tracking-widest rounded">
      Premijera
    </div>
  </div>

  <div class="flex flex-col justify-center space-y-8 max-w-xl">
    <div>
      <h2 class="text-3xl font-bold uppercase mb-4">Opis</h2>
      <p class="text-lg leading-relaxed text-gray-700">{{ $show->description }}</p>
    </div>

    <div class="space-y-3 text-md text-gray-800">
      <p><span class="font-semibold">📅 Datum:</span> {{ $showTime->date }}</p>
      <p><span class="font-semibold">⏰ Vrijeme:</span> {{ $showTime->start_time }}</p>
      <p><span class="font-semibold">📍 Lokacija:</span> {{ $showTime->hall->name }}</p>
      <p><span class="font-semibold">💺 Slobodna mesta:</span> {{ $availableSeats }}</p>
    </div>

    <div class="pt-6 flex gap-4">
      <a href="{{ route('seats.index', ['id' => $show->id]) }}"
         class="px-6 py-3 bg-[#ee4674] text-white uppercase font-bold tracking-wider hover:bg-black transition rounded">
        🎟 Prikaži sedišta
      </a>

      @can('admin')
      <a href="{{ route('shows.edit', ['show' => $show->id]) }}" 
         class="px-6 py-3 bg-gray-400 text-black uppercase font-bold tracking-wider hover:bg-gray-500 transition rounded">
        ✏️ Uredi predstavu
      </a>
      @endcan
    </div>
  </div>
</section>

</x-layout>
