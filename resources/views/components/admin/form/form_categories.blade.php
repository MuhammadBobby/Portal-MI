@props(['values', 'action', 'method'])

<section class="bg-white rounded-lg shadow-xl bg-opacity-70 backdrop-blur-sm">
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-4 text-xl font-bold text-gray-900">{{ $method == 'POST' ? 'Add a' : 'Update ' }} news to Portal MI
        </h2>
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($method == 'PATCH')
                @method('PATCH')
            @endif

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                {{-- name --}}
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->name ?? old('name') }}" placeholder="Category Name..." required="">
                    @error('name')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- IMAGE --}}
                <div class="w-full">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Image</label>
                    <div class="flex">
                        <input type="file" name="image" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block px-2.5 w-full"
                            value="{{ $values->image ?? old('image') }}" placeholder="Image Category..."
                            accept="image/*" {{ $method == 'POST' ? 'required' : '' }}>
                    </div>
                    @error('image')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    @if ($errors->any() && $method == 'POST')
                        <div class="mt-2 text-sm text-red-500">Please re-upload the image</div>
                    @endif
                </div>

                @if (old('image'))
                    <div class="w-full">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Current Image</label>
                        <div class="flex gap-1">
                            <img src="/uploads/news/{{ old('image') }}" alt="current image" class="object-cover w-1/2">
                            <p class="text-sm text-primary">{{ old('image') }}</p>
                        </div>
                    </div>
                @elseif (isset($values->image))
                    <div class="w-full">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Current Image</label>
                        <div class="flex gap-1">
                            <img src="/uploads/news/{{ $values->image }}" alt="current image"
                                class="object-cover w-1/2">
                            <p class="text-sm text-primary">{{ $values->image }}</p>
                        </div>
                    </div>
                @endif

                {{-- color --}}
                <div class="w-full">
                    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 ">Color</label>
                    <input type="color" name="color" id="color" value="#000000"
                        value="{{ $values->color ?? old('color') }}" placeholder="color News..." required="">
                    @error('color')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Category
                        Description</label>
                    <input type="text" name="description" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->description ?? old('description') }}" placeholder="Category description..."
                        required="">
                    @error('description')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>


            </div>

            {{-- BUTTON --}}
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-{{ $method == 'POST' ? 'primary' : '[#FFD700]' }} rounded-lg focus:ring-4 focus:ring-primary">
                {{ $method == 'POST' ? 'Upload News' : 'Update News' }}
            </button>
            <a href="/admin/news"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-400 rounded-lg focus:ring-4 focus:ring-gray-400">
                Cancel
            </a>
        </form>
    </div>
</section>
