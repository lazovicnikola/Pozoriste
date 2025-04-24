<x-layout>
    <x-slot:header>
        Repertoar
    </x-slot:header>

    <div class="space-y-4">
        @if($shows->count() == 0)
        <div class="flex items-center justify-center">
            @can('admin')
            <p>Trenutno nema predstava. <a href="{{ route('shows.create') }}" class="text-blue-500 underline">Dodaj predstavu</a></p>
            @endcan
        </div>
        @else
        @can('admin')
        <div class="flex justify-center">
            <a href="/shows/create"
                class="mb-8 inline-block px-8 py-4 bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 text-white text-lg font-bold rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-all">
                Dodaj novu predstavu
            </a>
        </div>
        @endcan
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
                    @foreach ($shows as $show)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-5 py-5 text-sm">{{ $show->date }}</td>
                        <td class="px-5 py-5 text-sm font-bold text-gray-900 dark:text-gray-100">{{ $show->title }}</td>
                        <td class="px-5 py-5 text-sm">{{ $show->start_time }}</td>
                        <td class="px-5 py-5 text-sm">{{ $show->hall->name }}</td>
                        <td class="px-5 py-5 text-sm">
                            <a href="{{ route('shows.show', $show->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">ULAZNICE</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif
        <div> {{$shows->links()}}</div>
    </div>
</x-layout>