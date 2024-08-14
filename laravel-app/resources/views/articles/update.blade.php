@vite('resources/css/app.css')

<div class="bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Edit Article</h2>

        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li text-center>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-800 font-bold">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="w-full border border-gray-300 py-2 px-4 rounded mt-2" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-800 font-bold">Content</label>
                <textarea name="content" id="content" class="w-full border border-gray-300 py-2 px-4 rounded mt-2" required>{{ old('content', $article->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-gray-800 font-bold">Category</label>
                <select name="category" id="category" class="w-full border border-gray-300 py-2 px-4 rounded mt-2">
                    <option value="">-- Choose a Category --</option>
                    <option value="Sport">Sport</option>
                    <option value="Social">Social</option>
                    <option value="Educatif">Educatif</option>
                    <option value="Technique"> Technique</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-800 font-bold">Image</label>
                <input type="file" name="image" id="image" class="w-full border border-gray-300 py-2 px-4 rounded mt-2">
                @if($article->image)
                    <img src="{{ asset('storage/'. $article->image) }}" alt="Article Image" class="mt-4 w-48">
                @endif
            </div>

            <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded">Update</button>
        </form>
    </div>
</div>
