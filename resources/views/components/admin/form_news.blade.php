@props(['values', 'categories', 'authors', 'action', 'method'])

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

                {{-- TITLE --}}
                <div class="sm:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title news</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->title ?? old('title') }}" placeholder="Title News..." required="">
                    @error('title')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- IMAGE --}}
                <div class="w-full">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Image</label>
                    <div class="flex">
                        <input type="file" name="image" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block px-2.5 w-full"
                            value="{{ $values->image ?? old('image') }}" placeholder="Image News..." accept="image/*"
                            {{ $method == 'POST' ? 'required' : '' }}>
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

                {{-- LOCATION --}}
                <div class="w-full">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                    <input type="text" name="location" id="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->location ?? old('location') }}" placeholder="Location News..."
                        required="">
                    @error('location')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CATEGORY --}}
                <div>
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                    <select id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        <option value="">Select category</option>

                        @foreach ($categories as $category)
                            {{-- cek apakah values ada atau tidak --}}
                            @if (isset($values->category_id))
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $values->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @else
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- AUTHOR --}}
                <div>
                    <label for="author_id" class="block mb-2 text-sm font-medium text-gray-900 ">Author</label>
                    <select id="author_id" name="author_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        <option value="">Select category</option>

                        @foreach ($authors as $author)
                            @if (isset($values->author_id))
                                <option value="{{ $author->id }}"
                                    {{ old('author_id', $values->author_id) == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @else
                                <option value="{{ $author->id }}"
                                    {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TOP --}}
                <div class="sm:col-span-2">
                    <label for="top" class="block mb-2 text-sm font-medium text-gray-900 ">Is Hot/Top News?</label>
                    <div class="flex gap-3">
                        <div>
                            <label for="top">Yes</label>
                            <input type="radio" name="top" id="top"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary focus:border-primary block p-2.5"
                                value="yes"
                                @if (isset($values->top)) {{ old('top', $values->top) == 'yes' ? 'checked' : '' }}
                                @else
                                    {{ old('top') == 'yes' ? 'checked' : '' }} @endif>
                        </div>
                        <div>
                            <label for="top">No</label>
                            <input type="radio" name="top" id="top"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary focus:border-primary block p-2.5"
                                value="no"
                                @if (isset($values->top)) {{ old('top', $values->top) == 'no' ? 'checked' : '' }}
                                @else
                                    {{ old('top') == 'no' ? 'checked' : '' }} @endif>
                        </div>
                    </div>
                </div>

                {{-- CONTENT --}}
                <div class="sm:col-span-2">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Paragraf
                        1</label>
                    <textarea id="1" name="content" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                        placeholder="Write news paragraph 1 here..." required>{{ $values->content ?? old('content') }}</textarea>
                    @error('content')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CONTENT 2-5 --}}
                @for ($i = 2; $i <= 5; $i++)
                    <div class="sm:col-span-2">
                        <label for="content_{{ $i }}"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Paragraf
                            {{ $i }}</label>
                        <textarea id="content_{{ $i }}" name="content_{{ $i }}" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                            placeholder="Write news paragraph {{ $i }} here..." {{ $i == 2 || $i == 3 ? 'required' : '' }}>{{ $values->{'content_' . $i} ?? old('content_' . $i) }}</textarea>
                        @error('content_' . $i)
                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                @endfor
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
