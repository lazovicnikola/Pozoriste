<x-layout>

    <x-slot:header>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-4">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name . ' ' . auth()->user()->last_name }}&background=6366F1&color=fff&rounded=true&size=64"
                    alt="Avatar" class="w-12 h-12 rounded-full shadow-lg">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                    </h1>
                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <div>
                <a href="/settings"
                    class="text-sm text-indigo-600 hover:text-indigo-800 hover:underline transition-all duration-200 font-medium">
                    ✏️ Izmeni profil
                </a>
            </div>
        </div>
    </x-slot:header>

    @can('admin')
    <div class="max-w-4xl mx-auto px-4 py-10 space-y-6">
        <div class="flex justify-center mt-6">
            <form action="{{ route('profile.index') }}" method="GET" class="flex items-center space-x-4">
                <input type="text" name="search" placeholder="Pretraga korisnika..."
                    class="px-6 py-3 rounded-full bg-white border border-gray-300 text-gray-700 text-lg w-96 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-300">

                <button type="submit"
                    class="inline-block px-8 py-4 bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white text-lg font-bold rounded-full shadow-xl hover:scale-105 transform transition duration-300">
                    🔍 Pretraži
                </button>
            </form>
        </div>
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">📋 Lista korisnika</h2>

        @if ($users->count() > 0)
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            @foreach ($users as $user)
            <a href="{{ route('profile.show', ['user' => $user->id]) }}"
                class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transform transition-all duration-300 flex items-center gap-4">
                <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=F43F5E&color=fff&rounded=true&size=48"
                    alt="Avatar" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
                <span class="text-sm text-gray-400 hover:text-red-500 transition">🡆</span>
            </a>
            @endforeach
        </div>
        @else
        <p class="text-gray-500 text-center">🙁 Nema pronađenih korisnika.</p>
        @endif
    </div>
    @endcan

    @cannot('admin')
    <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-white tracking-tight mb-8 uppercase">Rezervacije</h1>
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
    @endcannot


    <div class="pt-12">
            {{ $users->links() }}
        </div>
</x-layout>