<x-layout>
    <x-slot:header>
        Settings page
    </x-slot:header>

    <!-- Forma za Prfile settings -->
    <form method="POST" action="/settings">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">


                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name">Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="name" id="name" value="{{ $user['name'] }}" required></x-form-input>
                            <x-form-error name="name" />
                        </div>
                    </x-form-field>



                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" value="{{ $user['email'] }}" required></x-form-input>
                            <x-form-error name="email" />
                        </div>
                        <div class="flex justify-between mt-8">
                            <label for="change_password" class="block text-xs/6 font-normal text-gray-400">Change password</label>
                            <input type="checkbox" class="mr-[600px]" name="change_password" id="change_password" onchange="togglePasswordFields(this)" />
                        </div>
                    </x-form-field>



                </div>
            </div>
            <div id="password_fields" class="hidden">
                <x-form-field>
                    <x-form-label for="old_password">Old Password</x-form-label>
                    <div class="mt-2 mb-8">
                        <x-form-input type="password" name="old_password" id="old_password"></x-form-input>
                        <!-- Poruka u slucaju loseg unosa -->
                        @error('old_password')
                        <script>
                            alert("{{ $message }}");
                        </script>
                        @enderror
                    </div>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="password">New Password</x-form-label>
                    <div class="mt-2 mb-8">
                        <x-form-input type="password" name="password" id="password"></x-form-input>
                        @error('password')
                        <script>
                            alert("{{ $message }}");
                        </script>
                        @enderror
                    </div>
                </x-form-field>


                <x-form-field>
                    <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                    <div class="mt-2">
                        <x-form-input type="password" name="password_confirmation" id="password_confirmation"></x-form-input>
                        @error('password_confirmation')
                        <script>
                            alert("{{ $message }}");
                        </script>
                        @enderror
                    </div>
                </x-form-field>
            </div>

        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('home') }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Update</x-form-button>
        </div>
    </form>

</x-layout>

<script>
    function togglePasswordFields(checkbox) {

        const passwordFields = document.getElementById('password_fields');
        const passwordInput = document.getElementById('old_password');
        const newPasswordInput = document.getElementById('password');
        const passwordConfirmationInput = document.getElementById('password_confirmation');

        if (checkbox.checked) {

            passwordInput.required = true;
            newPasswordInput.required = true;
            passwordConfirmationInput.required = true;
            passwordFields.classList.remove('hidden');
        } else {

            passwordInput.required = false;
            newPasswordInput.required = false;
            passwordConfirmationInput.required = false;
            passwordFields.classList.add('hidden');
        }

    }
</script>