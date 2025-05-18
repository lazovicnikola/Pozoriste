<x-layout>
    <x-slot:header>
        <h1 class="text-4xl font-bold text-blue-700 text-center uppercase">O nama</h1>
    </x-slot:header>

    <div class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 space-y-6">
            <h2 class="text-2xl font-semibold text-blue-600">🎭 Naša misija</h2>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                Naša platforma omogućava korisnicima jednostavnu rezervaciju karata za razne kulturne događaje — pozorišta, koncerte, festivale i više.
                Cilj nam je digitalizovati iskustvo kupovine ulaznica i učiniti ga pristupačnijim svima.
            </p>

            <h2 class="text-2xl font-semibold text-blue-600">👥 Naš tim</h2>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                Iza ovog projekta stoji mali, ali posvećen tim developera, dizajnera i zaljubljenika u umjetnost. Vjerujemo u moć tehnologije da poveže ljude s kulturom.
            </p>

            <h2 class="text-2xl font-semibold text-blue-600">📍 Gdje nas možete naći?</h2>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                Nalazimo se u srcu Sarajeva, ali naša digitalna vrata su otvorena svima širom Balkana. Radujemo se vašem dolasku!
            </p>

            <div class="text-center mt-8">
                <a href="{{ route('shows') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-full transition duration-300">
                    🎫 Pogledaj događaje
                </a>
            </div>
        </div>
    </div>
</x-layout>
