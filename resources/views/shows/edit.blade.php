<x-layout>
    <x-slot:header>
        Edit {{$show->title}}
    </x-slot:header>

    <!-- Editovanje Pjesme -->
    <form method="POST" action="{{ route('shows.update', $show->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-900">Naslov</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                    placeholder="Shift Leader"
                                    value="{{$show->title}}"
                                    required>
                            </div>
                            @error('title')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>



                    <div class="sm:col-span-4">
                        <label for="director" class="block text-sm font-medium text-gray-900">Reziser</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="director" id="director" value="{{$show->director}}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                    required>
                            </div>
                            @error('director')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:col-span-4">
                        <label for="description" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <textarea name="description" id="description"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                    placeholder="Shift Leader"
                                    required>{{$show->description}}</textarea>
                            </div>
                            @error('description')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:col-span-4">
                        <label for="hall_id" class="block text-sm font-medium text-gray-900">Mjesto održavanja</label>
                        <div class="mt-2 flex">

                            <input type="radio" name="hall_id" id="hall_mala" value="1"
                                {{ old('hall_id', $show->hall_id ?? '') == 1 ? 'checked' : '' }}>
                            <p class="mr-4 ml-2 text-sm/6 font text-gray-900">Mala sala</p>

                            <input type="radio" name="hall_id" id="hall_velika" value="2"
                                {{ old('hall_id', $show->hall_id ?? '') == 2 ? 'checked' : '' }}>
                            <p class="mr-4 ml-2 text-sm/6 font text-gray-900">Velika sala</p>

                            @error('hall_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:col-span-4">
                        <label for="base_price" class="block text-sm font-medium text-gray-900">Cijena</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="number" name="base_price" id="base_price"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                    placeholder="Shift Leader"
                                    value="{{$show->base_price}}"
                                    required>
                            </div>
                            @error('base_price')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="date" class="block text-sm font-medium text-gray-900">Datum</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="date" name="date" id="date"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                    placeholder="Shift Leader"
                                    value="{{$show->date}}"
                                    required>
                            </div>
                            @error('date')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="start_time" class="block text-sm font-medium text-gray-900">Vrijeme pocetka</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="time" name="start_time" id="start_time"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                    placeholder="Shift Leader"
                                    value="{{$show->start_time}}"
                                    required>
                            </div>
                            @error('start_time')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="image_path" class="block text-sm font-medium text-gray-900">Vrijeme pocetka</label>
                        <div class="mt-2 flex">

                            <input type="file" name="image_path" id="image_path"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                placeholder="Shift Leader"
                                value="{{$show->image_path}}"
                                required>

                            @error('image_path')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-2" hidden>
                        <x-form-input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}"></x-form-input>
                    </div>




                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-show" class="text-sm font-bold text-red-500">Delete</button>
            </div>

            <div class="flex gap-x-6 items-center">
                <a href="/shows" class="text-sm font-semibold text-gray-900">Cancel</a>
                <div>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form action="/shows/{{$show->id}}" method="POST" hidden id="delete-show">
        @method('DELETE')
        @csrf
    </form>
</x-layout>