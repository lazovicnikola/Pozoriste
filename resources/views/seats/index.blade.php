<x-layout>
    <x-slot:header>
        Sedišta za predstavu: {{ $show->title }}
    </x-slot:header>

    <div class="flex flex-col items-center overflow-x-auto gap-4 p-4 w-full">
        <form method="POST" action="{{ route('seats.confirm') }}" class="flex flex-col items-center">
            @csrf
            <input type="hidden" name="show_id" value="{{ $show->id }}">
            
            @foreach ($seats as $row => $seatsInRow)
            <div class="flex items-center">
                <div class="w-12 font-bold text-gray-700">{{ $row }}</div>

                @foreach ($seatsInRow->sortBy('number') as $seat)
                @if (in_array($seat->id, $reservedSeats))
                <div class="bg-red-500 text-white font-semibold text-xs py-1 px-2 w-8 h-8 
                            flex items-center justify-center rounded-md m-1 cursor-not-allowed">
                    {{ $seat->number }}
                </div>
                @else
                <label class="seat-label bg-green-500 text-white font-semibold text-xs py-1 px-2 w-8 h-8 
                            flex items-center justify-center rounded-md m-1 cursor-pointer">
                    <input type="checkbox" name="seat_ids[]" value="{{ $seat->id }}" class="hidden seat-checkbox">
                    {{ $seat->number }}
                </label>
                @endif
                @endforeach
            </div>
            @endforeach

            <div class="mt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-md">
                    Potvrdi izbor sedišta
                </button>
            </div>
        </form>
    </div>
</x-layout>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let seats = document.getElementsByClassName("seat-label");

        for (let i = 0; i < seats.length; i++) {
            seats[i].addEventListener("click", function () {
                let checkbox = this.getElementsByClassName("seat-checkbox")[0];

                if (checkbox.checked) {
                    this.style.backgroundColor = "green";
                    this.style.color = "white";
                } else {
                    this.style.backgroundColor = "#22c55e";
                    this.style.color = "white";
                }
            });
        }
    });
</script>
