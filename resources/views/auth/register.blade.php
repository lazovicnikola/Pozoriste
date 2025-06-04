<x-layout>
  <x-slot:header>
    <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-white tracking-tight uppercase">Registracija</h1>
  </x-slot:header>

  <!-- Form za registraciju usera -->
  <form method="POST" action="/register">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">

        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="name">Ime</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="name" id="name" required></x-form-input>
              <x-form-error name="name" />
            </div>
          </x-form-field>


          <x-form-field>
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
              <x-form-input type="email" name="email" id="email" required></x-form-input>
              <x-form-error name="email" />
            </div>
          </x-form-field>


          <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <div class="mt-2">
              <x-form-input type="password" name="password" id="password" required></x-form-input>
              <x-form-error name="password" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="password_confirmation">Potvrdi password</x-form-label>
            <div class="mt-2">
              <x-form-input type="password" name="password_confirmation" id="password_confirmation" required></x-form-input>
              <x-form-error name="password_confirmation" />
            </div>
          </x-form-field>


        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a type="button" class="text-sm/6 font-semibold text-gray-900">Odustani</a>
      <x-form-button>Registracija</x-form-button>
    </div>
  </form>

</x-layout>