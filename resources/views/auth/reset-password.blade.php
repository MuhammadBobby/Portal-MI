<x-layout_not_navbar title="{{ $title }}">

    <section class="flex items-center justify-center w-screen min-h-screen">
        <div class="pb-3 border-b-2 rounded-lg pe-3 border-e-2 border-secondary md:w-1/2">
            <div class="px-4 py-8 mx-auto bg-white rounded-lg shadow-xl bg-opacity-70 backdrop-blur-sm">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Password Reset
                </h2>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                value="{{ old('email') }}" required="" autofocus>
                            @error('email')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="relative sm:col-span-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New
                                Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                value="{{ old('password') }}" required="" placeholder="********">
                            {{-- lihat password --}}
                            <button type="button" id="togglePassword" class="absolute right-0 top-1/2">
                                👁️
                            </button>
                        </div>
                        @error('password')
                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                        @enderror

                        <div class="relative sm:col-span-2">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                value="{{ old('password_confirmation') }}" required="" placeholder="********">
                            {{-- lihat password --}}
                            <button type="button" id="togglePasswordConfirmation" class="absolute right-0 top-1/2">
                                👁️
                            </button>
                        </div>
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary">
                        Reset Password
                    </button>
                    <a href="/login"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-400 rounded-lg focus:ring-4 focus:ring-gray-400">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/showPassword.js') }}"></script>
</x-layout_not_navbar>
