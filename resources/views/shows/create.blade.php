<x-layout>
  <x-slot:header>
    Create page
  </x-slot:header>

  <form method="POST" action="{{ route('shows.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Kreiraj predstavu</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Trebaju nam informacije o predstavi</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <x-form-field>
            <x-form-label for="title">Naslov</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="title" id="title" placeholder="Title" required></x-form-input>
              <x-form-error name="title" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="director">Reziser</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="director" id="director" placeholder="Name" required></x-form-input>
              <x-form-error name="director" />
            </div>
          </x-form-field>


          <x-form-field>
            <x-form-label for="description">Opis</x-form-label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <textarea
                  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                  name="description"
                  id="description"
                  placeholder="Description"
                  required></textarea>
              </div>
              <x-form-error name="description" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="hall_id">Mjesto odrzavanja</x-form-label>
            <div class="mt-2 flex">
              <input type="radio" name="hall_id" id="hall_id" value="1">
              <p class="mr-4 ml-2 text-sm/6 font text-gray-900">Mala sala</p></input>
              <input type="radio" name="hall_id" id="hall_id" value="2">
              <p class="mr-4 ml-2 text-sm/6 font text-gray-900">Velika sala</p></input>
              <x-form-error name="hall_id" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="price">Cijena</x-form-label>
            <div class="mt-2">
              <x-form-input type="number" name="price" id="price" placeholder="10.00$" required></x-form-input>
              <x-form-error name="price" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="dates">Odaberi datume</x-form-label>
            <input
              type="text"
              id="dates"
              name="dates"
              class="flatpickr-input"
              placeholder="Izaberi datume"
              required />
            <x-form-error name="dates" />
          </x-form-field>


          <x-form-field>
            <x-form-label for="start_time">Odaberi vremena</x-form-label>
            <div class="mt-2 flex space-x-4"> 
              @foreach (['12:00', '16:00', '20:00'] as $time)
              <label class="flex items-center space-x-2">
                <input type="radio" name="start_time" value="{{ $time }}">
                <span>{{ $time }}</span>
              </label>
              @endforeach
            </div>
            <x-form-error name="start_time" />
          </x-form-field>


          <x-form-field>
            <x-form-label for="image_path">Ubaci sliku</x-form-label>
            <div class="mt-2">
              <input type="file" name="image_path" id="image_path" required></input>
              <x-form-error name="image_path" />
            </div>
          </x-form-field>

          <!-- <div class="mt-2" hidden>
            <x-form-input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}"></x-form-input>
          </div> -->

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <x-form-button>Save</x-form-button>
    </div>
  </form>

</x-layout>
<script>
  flatpickr("#dates", {
    mode: "multiple",
    dateFormat: "Y-m-d"
  });
</script>