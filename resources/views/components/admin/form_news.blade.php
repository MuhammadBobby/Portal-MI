@props(['values', 'categories', 'authors'])

<section class="bg-white rounded-lg shadow-xl bg-opacity-70 backdrop-blur-sm">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Add a news to Portal MI</h2>
        <form action="/admin/news" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title news</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->title ?? '' }}" placeholder="Title News..." required="">
                </div>
                <div class="w-full">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Image</label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full px-2.5"
                        value="{{ $values->image ?? '' }}" placeholder="Image News..." accept="image/*" required="">
                </div>
                <div class="w-full">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                    <input type="text" name="location" id="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $values->location ?? '' }}" placeholder="Location News..." required="">
                </div>
                <div>
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                    <select id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        <option selected="" value="{{ $values->location ?? '' }}">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="author_id" class="block mb-2 text-sm font-medium text-gray-900 ">Author</label>
                    <select id="author_id" name="author_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        <option selected="" value="{{ $values->location ?? '' }}">Select author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="top" class="block mb-2 text-sm font-medium text-gray-900 ">Is Hot/Top News?</label>
                    <div class="flex gap-3">
                        <div>
                            <label for="top">Yes</label>
                            <input type="radio" name="top" id="top"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary focus:border-primary block p-2.5"
                                value="yes">
                        </div>
                        <div>
                            <label for="top">No</label>
                            <input type="radio" name="top" id="top"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary focus:border-primary block p-2.5"
                                value="no" checked>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Paragraf
                        1</label>
                    <textarea id="1" name="content" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                        value="{{ $values->content ?? '' }}" placeholder="Write news paragraph 1 here..." required></textarea>
                </div>
                @for ($i = 2; $i <= 5; $i++)
                    <div class="sm:col-span-2">
                        <label for="content_{{ $i }}"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Paragraf
                            {{ $i }}</label>
                        <textarea id="content_{{ $i }}" name="content_{{ $i }}" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                            placeholder="Write news paragraph {{ $i }} here..." value={{ $values->{'content_' . $i} ?? '' }}
                            {{ $i == 2 || $i == 3 ? 'required' : '' }}></textarea>
                    </div>
                @endfor
            </div>
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary">
                Add product
            </button>
        </form>
    </div>
</section>
