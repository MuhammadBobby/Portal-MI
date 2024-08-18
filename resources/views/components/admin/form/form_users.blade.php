@props(['values'])

<section class="bg-white rounded-lg shadow-xl bg-opacity-70 backdrop-blur-sm">
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Update user to Portal MI
        </h2>
        <form action="/admin/users/{{ $values->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                {{-- NAME --}}
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->name ?? old('name') }}" required="">
                    @error('name')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="sm:col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->email ?? old('email') }}" readonly>
                    @error('email')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ROLE --}}
                <div class="sm:col-span-2">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                    <select id="role" name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        <option value="">Select Role</option>
                        <option value="admin" {{ old('role', $values->role) == 'admin' ? 'selected' : '' }}>Admin
                        </option>
                        <option value="member" {{ old('role', $values->role) == 'member' ? 'selected' : '' }}>Member
                        </option>
                    </select>
                    @error('role')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- BUTTON --}}
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-[#FFD700] rounded-lg focus:ring-4 focus:ring-primary">
                Update
            </button>
            <a href="/admin/users"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-400 rounded-lg focus:ring-4 focus:ring-gray-400">
                Cancel
            </a>
        </form>
    </div>
</section>
