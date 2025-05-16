<x-layout>
    <x-slot:header>
        {{ $user->name }}
        <p class="text-xs text-gray-500">({{ $user->email }})</p>
    </x-slot:header>


    <div class="overflow-hidden shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-gray-100 dark:bg-gray-800 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Datum</th>
                    <th class="px-5 py-3 bg-gray-100 dark:bg-gray-800 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Događaj</th>
                    <th class="px-5 py-3 bg-gray-100 dark:bg-gray-800 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Termin</th>
                    <th class="px-5 py-3 bg-gray-100 dark:bg-gray-800 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mesto održavanja</th>
                    <th class="px-5 py-3 bg-gray-100 dark:bg-gray-800 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ulaznice</th>
                </tr>
            </thead>
            <tbody>
                @if ($reservations->count() > 0)
                @foreach ($reservations as $reservation)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-5 py-5 text-sm">{{ $reservation->showTime->date }}</td>
                    <td class="px-5 py-5 text-sm font-bold text-gray-900 dark:text-gray-100">{{ $reservation->showTime->show->title}}</td>
                    <td class="px-5 py-5 text-sm">{{ $reservation->showTime->start_time }}</td>
                    <td class="px-5 py-5 text-sm">{{$reservation->showTime->hall->name}}</td>
                    <td class="px-5 py-5 text-sm">
                        <a href="{{ route('profile.review', [$reservation->showTime->show->id, $reservation->user_id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Pregled
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <p class="text-gray-500">No reservations found.</p>
                @endif
            </tbody>
        </table>
    </div>
</x-layout>