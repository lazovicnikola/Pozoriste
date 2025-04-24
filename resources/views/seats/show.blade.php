<x-layout>
    <x-slot:header>
        Potvrda rezervacije za predstavu: {{ $show->title }}
    </x-slot:header>

    
    <div class="flex flex-col items-center p-8">
        <h2 class="text-3xl font-bold mb-8">Odabrana Sedišta</h2>
       
        <form method="POST" class="mt-6 mb-8">
            @csrf
            <input type="hidden" name="show_id" value="{{ $show->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    
            @foreach ($seats as $seat)
            <input type="hidden" name="seat_ids[]" value="{{ $seat->id }}">
            @endforeach
    
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-4 px-10 rounded-xl text-xl shadow-lg">
                Potvrdi Rezervaciju
            </button>
        </form>

        @foreach ($seats as $seat)
        <div class="bg-white shadow-xl rounded-2xl p-8 mb-8 w-full max-w-2xl border border-gray-300 relative">
            <h3 class="text-2xl font-semibold text-gray-900">{{ $show->title }}</h3>
            <p class="text-gray-700 text-lg">Datum: <span class="font-medium">{{ $show->date }}</span></p>
            <p class="text-gray-700 text-lg">Vreme: <span class="font-medium">{{ $show->start_time }}</span></p>
            <div class="flex justify-between items-center mt-4">
                <div>
                    <p class="text-xl font-semibold text-gray-900">Sedište: {{ $seat->number }}</p>
                    <p class="text-gray-700 text-lg">Red: {{ $seat->row }}</p>
                </div>
                
            </div>
        </div>
        @endforeach

    </div>
</x-layout>