<x-layout>
  <x-slot:header>
    {{ $show->title }}
    <p class="text-xs text-gray-500">({{ $show->user->name }})</p>
  </x-slot:header>

  <section class="bg-gray-100 p-6 rounded-lg shadow-lg max-w-4xl mx-auto mt-6">
    <div class="flex flex-col md:flex-row items-center gap-6">

      <div class="md:w-1/2 w-full">
        <img src="{{ asset("storage/{$show->image_path}") }}" alt="Show Image" class="rounded-lg shadow-md w-full">
      </div>

      <div class="md:w-1/2 w-full">
        <h2 class="text-2xl font-bold text-gray-800">{{ $show->title }}</h2>
        <p class="text-gray-600 mt-2">{{ $show->description }}</p>
        <div class="mt-4 space-y-2">
          <p class="text-gray-600"><span class="font-semibold">Datum:</span> {{ $show->date }}</p>
          <p class="text-gray-600"><span class="font-semibold">Vrijeme:</span> {{ $show->start_time }}</p>
          <p class="text-gray-600"><span class="font-semibold">Mjesto održavanja:</span> {{ $show->hall->name }}</p>
          <p class="text-gray-600"><span class="font-semibold">Režiser:</span> {{ $show->director }}</p>
          <p class="text-gray-600"><span class="font-semibold">Slobodni sedišta:</span> {{ $show->available_seats }}</p>
        </div>
      </div>
    </div>

    <!-- Buttons -->
    <div class="mt-6 flex justify-between">
      <x-button href="{{ route('seats.index', ['id' => $show->id]) }}" class="bg-blue-600 hover:bg-blue-700 text-white">
        Prikaži sedišta
      </x-button>

      @can('admin')
      <x-button href="{{ route('shows.edit', ['show' => $show->id]) }}" class="bg-gray-600 hover:bg-gray-700 text-white">
        Edit Show
      </x-button>
      @endcan
    </div>
  </section>
</x-layout>