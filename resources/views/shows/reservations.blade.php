

<x-layout>
    <x-slot:header>
        <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-white tracking-tight uppercase">Rezervacije - {{ $show->title }}</h1>
    </x-slot:header>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg overflow-x-auto gap-4 mb-24">
        <h2 class="text-2xl font-semibold mb-4">Podaci o rezervacijama</h2>

        <table id="reservation-table" class="w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Korisnik</th>
                    <th class="p-3 text-left">Red</th>
                    <th class="p-3 text-left">Sjedište</th>
                    <th class="p-3 text-left">Vrsta ulaznice</th>
                    <th class="p-3 text-left">Ukloni</th>
                </tr>
            </thead>
            <tbody>
                @if ($reservations->isEmpty())
                <tr>
                    <td colspan="5" class="p-3 text-center">🙁 Nema rezervacija za ovu predstavu.</td>
                </tr>
                @endif
                @foreach ($reservations as $reservation)
                <tr class="border-t seat-row">
                    <td class="p-3"><a href="{{ route('profile.show', $reservation->user->id) }}" class="text-blue-500 hover:underline">{{ $reservation->user->name }}</a></td>
                    <td class="p-3">{{ $reservation->seat->row }}</td>
                    <td class="p-3">{{ $reservation->seat->number }}</td>
                    <td class="p-3">{{ $reservation->type }}</td>
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

