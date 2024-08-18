<x-layout_template title="{{ $title }}">
    <x-elements.section_template id="edit-profile">


        <div class="max-w-lg pb-2 mx-auto border-b-2 rounded-lg pe-2 border-secondary border-e-2">
            <section class="max-w-lg mx-auto bg-white rounded-lg shadow-xl bg-opacity-70 backdrop-blur-sm">
                <div class="px-4 py-8">
                    <h2 class="mb-4 text-xl font-bold text-gray-900">Change Password
                    </h2>
                    <form action="/profile/updatePassword" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                            {{-- OLD --}}
                            <div class="sm:col-span-2">
                                <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900">Old
                                    Password</label>
                                <input type="password" name="old_password" id="old_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                    value="{{ old('old_password') }}" placeholder="********" autocomplete="off"
                                    required="">
                            </div>
                            @error('old_password')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror

                            {{-- NEW --}}
                            <div class="relative sm:col-span-2">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New
                                    Password</label>
                                <input type="password" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                    value="{{ old('password') }}" placeholder="********" autocomplete="off"
                                    required="">


                                {{-- lihat password --}}
                                <button type="button" id="togglePassword" class="absolute right-0 top-1/2">
                                    👁️
                                </button>
                            </div>
                            @error('password')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror

                            {{-- CONFIRM --}}
                            <div class="relative sm:col-span-2">
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900">Confirm New
                                    Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                    value="{{ old('password_confirmation') }}" placeholder="********" autocomplete="off"
                                    required="">

                                {{-- lihat password --}}
                                <button type="button" id="togglePasswordConfirmation" class="absolute right-0 top-1/2">
                                    👁️
                                </button>
                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-[#FFD700] rounded-lg focus:ring-4 focus:ring-primary">
                            Update
                        </button>
                        <a href="/profile"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-400 rounded-lg focus:ring-4 focus:ring-gray-400">
                            Cancel
                        </a>
                    </form>
                </div>
            </section>
        </div>

        <script src="{{ asset('js/showPassword.js') }}"></script>
    </x-elements.section_template>
</x-layout_template>
