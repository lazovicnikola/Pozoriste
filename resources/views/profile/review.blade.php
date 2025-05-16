<x-layout>
    <x-slot:header>
        <h1 class="text-4xl font-bold text-center text-gray-800">Rezervacija</h1>
    </x-slot:header>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg overflow-x-auto gap-4">

        <h2 class="text-2xl font-semibold mb-4">Podaci o kupovini</h2>

        <table id="reservation-table" class="w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Predstava</th>
                    <th class="p-3 text-left">Vrijeme</th>
                    <th class="p-3 text-left">Red</th>
                    <th class="p-3 text-left">Sedište</th>
                    <th class="p-3 text-left">Vrsta ulaznice</th>
                    <th class="p-3 text-left">Cijena (€)</th>
                    <th class="p-3 text-left">Ukloni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr class="border-t seat-row">
                    <td class="p-3">{{ $reservation->showTime->show->title }}</td>
                    <td class="p-3">{{ $reservation->showTime->start_time }}</td>
                    <td class="p-3">{{ $reservation->seat->row }}</td>
                    <td class="p-3">{{ $reservation->seat->number }}</td>
                    <td class="p-3">{{ $reservation->type }}</td>
                    <td class="p-3">
                        <input type="text" class="border p-2 w-20 rounded text-center price"  value="{{ $reservation->price }}" readonly>
                    </td>
                    <td class="p-3">
                        <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Otkaži
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>

</x-layout>