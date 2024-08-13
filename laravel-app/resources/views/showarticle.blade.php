@vite('resources/css/app.css')

<div class="bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Articles</h2>

        <div class="mb-4">
            <form method="GET" action="{{ route('articles.index') }}">
                <label for="sort_by" class="block text-gray-800 font-bold">Sort by:</label>
                <select name="sort_by" id="sort_by" class="border border-gray-300 rounded py-2 px-3">
                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date</option>
                    <option value="category" {{ request('sort_by') == 'category' ? 'selected' : '' }}>Category</option>
                </select>
                <button type="submit" class="ml-2 bg-indigo-500 text-white py-2 px-4 rounded">Sort</button>
            </form>
        </div>

        @if($articles->count())
            <div class="bg-white shadow-md rounded-md p-6">
                @foreach($articles as $article)
                    <div class="mb-6 border-b pb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $article->title }}</h3>
                        <p class="text-gray-700 mt-1">Category: {{ $article->category }}</p>
                        <p class="text-gray-600 mt-1">{{ $article->created_at->format('F j, Y') }}</p>
                        <p class="text-gray-800 mt-2">{{ Str::limit($article->content, 150) }}</p>
                    </div>
                @endforeach

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $articles->links() }}
                </div>
            </div>
        @else
            <p class="text-gray-700">No articles found.</p>
        @endif
    </div>
</div>
