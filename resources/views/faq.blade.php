<x-layout>
    <x-slot:header>
        <h1 class="text-4xl font-bold text-blue-700 text-center uppercase">Česta pitanja</h1>
    </x-slot:header>

    <div class="max-w-4xl mx-auto px-6 py-10 space-y-6">

        @php
            $faqs = [
                ['Kako mogu rezervisati kartu?', 'Odaberite predstavu, izaberite sjedišta i pratite korake do plaćanja.'],
                ['Da li postoji studentski popust?', 'Da – odaberite “Student” tip ulaznice prilikom rezervacije i priložite validnu X‑icu pri preuzimanju.'],
                ['Mogu li otkazati rezervaciju?', 'Otkazivanje je moguće do 24 h prije početka događaja putem vašeg profila.'],
                ['Kako dobijam ulaznicu?', 'PDF ulaznicu preuzimate nakon potvrde rezervacije, a stiže i na vaš email.'],
            ];
        @endphp

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($faqs as [$question, $answer])
                <details class="p-5 open:bg-blue-50 dark:open:bg-gray-900 group">
                    <summary class="cursor-pointer flex justify-between items-center text-blue-600 font-medium">
                        {{ $question }}
                        <span class="transition group-open:rotate-180">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-700 dark:text-gray-300">{{ $answer }}</p>
                </details>
            @endforeach
        </div>

        <div class="text-center pt-6">
          
                ❓ Još pitanja? Kontaktirajte nas: <br>
                📧 <a href="mailto:kontakt@example.com" class="text-blue-600 hover:underline">kontakt@example.com</a><br>
                📞 +387 61 123 456
         
        </div>
    </div>
</x-layout>
