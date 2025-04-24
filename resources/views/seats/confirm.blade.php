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
                </tr>
            </thead>
            <tbody>
                @foreach ($seats as $seat)
                <tr class="border-t seat-row">
                    <td class="p-3">{{ $show->title }}</td>
                    <td class="p-3">{{ $show->start_time }}</td>
                    <td class="p-3">{{ $seat->row }}</td>
                    <td class="p-3">{{ $seat->number }}</td>

                    <td class="p-3">
                        <select name="ticket_type[]" class="border p-2 rounded type" onchange="updatePrice(this); updateType(this,'{{ $seat->id }}');">
                            <option value="Regular" data-price="{{ $show->base_price * 1}}" selected>Obični kupci</option>
                            <option value="Student" data-price="{{ $show->base_price * 0.7 }}">Student</option>
                        </select>
                    </td>

                    <td class="p-3">
                        <input type="text" class="border p-2 w-20 rounded text-center price" name="ticket_price[]" value="{{ $show->base_price }}" readonly>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="total-price-container" class="flex justify-end mt-4 text-xl font-semibold">
            Ukupno: <span id="total-price" class="ml-2">0.00 € (EUR)</span>
        </div>

        <h2 class="text-2xl font-semibold mt-8 mb-4">Podaci o kupcu</h2>
        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-gray-700">Ime kupca</p>
                <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
            </div>
            <div>
                <p class="text-gray-700">Email adresa</p>
                <p class="text-lg font-semibold">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <form action="{{ route('seats.store') }}" method="POST" class="mt-6">
            @csrf

            <input type="hidden" name="show_id" value="{{ $show->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            @foreach ($seats as $seat)
            <input type="hidden" name="seat_ids[]" value="{{ $seat->id }}">
            <input type="hidden" name="type_hidden[]" id="type_hidden_{{ $seat->id }}">
            @endforeach
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-4 px-10 rounded-xl text-xl shadow-lg w-full">
                Potvrdi Rezervaciju
            </button>
        </form>
    </div>

    <script>
        window.onload = function() {
            totalPrice();
        };

        function updatePrice(selectElement) {
            const row = selectElement.closest('tr');
            const priceElement = row.querySelector('.price');
            const price = parseFloat(selectElement.selectedOptions[0].getAttribute('data-price')).toFixed(2);

            priceElement.value = price;
            totalPrice();
        }

        function totalPrice() {
            let total = 0;
            document.querySelectorAll('.seat-row').forEach(seat => {
                const priceElement = seat.querySelector('.price');
                const price = parseFloat(priceElement.value);
                total += price;
            });

            document.getElementById('total-price').textContent = total.toFixed(2) + " € (EUR)";
        }

        function updateType(selectElement, seatId) {
            console.log(selectElement);
            const selectedType = selectElement.value;

            const hiddenInput = document.getElementById('type_hidden_' + seatId);
            hiddenInput.value = selectedType;

        }
    </script>
</x-layout>