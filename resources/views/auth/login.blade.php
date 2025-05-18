<x-layout>
  <x-slot:header>
  <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-white tracking-tight uppercase">Prijava</h1>
  </x-slot:header>

  <!-- Form za login usera -->
  <form method="POST" action="/login">
    @csrf

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mb-20">



          <x-form-field>
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
              <x-form-input type="email" name="email" id="email" value="{{old('email')}}" required></x-form-input>
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

        </div>
    </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
      <x-form-button>Login</x-form-button>
    </div>
  </form>

</x-layout>