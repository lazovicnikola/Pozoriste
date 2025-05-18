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
                    ✏️ Izmijeni profil
                </a>
            </div>
        </div>
    </x-slot:header>

    @can('admin')
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="max-w-4xl mx-auto px-4 py-10 space-y-6">
        <div class=" mt-6 px-4 flex justify-center ">
            <form action="{{ route('profile.index') }}" method="GET"
                class="flex flex-col sm:flex-row items-stretch gap-4 w-full max-w-2xl flex justify-center">

                <input type="text" name="search" placeholder="Pretraga korisnika..."
                    class="px-4 py-2 w-64 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition">

                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm shadow hover:bg-blue-700 transition">
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
                <img src="{{ $user->role == 'admin' ? 'https://ui-avatars.com/api/?name='.auth()->user()->name . ' ' . auth()->user()->last_name.'&background=6366F1&color=fff&rounded=true&size=64' : 'https://ui-avatars.com/api/?name='. $user->name .'&background=F43F5E&color=fff&rounded=true&size=48' }}"
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
    <div class="pt-12">
        {{ $users->links() }}
    </div>
    @endcan

    @cannot('admin')
    <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-white tracking-tight mb-8 uppercase">Rezervacije</h1>

    <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
        <table class="min-w-[700px] w-full leading-normal">
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
                <tr>
                    <td colspan="5" class="text-gray-500 px-5 py-5 text-center">🙁 Nema rezervacija.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    @endcannot

</x-layout>