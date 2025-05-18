<x-layout>
    <x-slot:header>
        <h1 class="text-3xl font-bold text-center mb-6">Potvrda rezervacije</h1>
    </x-slot:header>

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow text-center mt-15 mb-24">
        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>

            <a href="{{ asset('storage/rezervacija.pdf') }}"
                download
                class="inline-block px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition mr-4">
                Preuzmi PDF potvrdu
            </a>
        @else
        <p class="text-gray-600">Nema dostupnih potvrda za preuzimanje.</p>
        @endif
    </div>

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow text-center mt-15 mb-24">
         <a href="{{ route('shows') }}"
                class="text-blue "> 
                << Pocetna
            </a>
    </div>
</x-layout>