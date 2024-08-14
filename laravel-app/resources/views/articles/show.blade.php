@include('partials.authheader')
<div class="bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Articles</h2><br>
        @if(session()->has('success'))
            <div class="bg-green-800 text-white" role="alert">
                {{session()->get('success')}}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="bg-red-800 text-white text-center" role="alert">
                {{session()->get('error')}}
            </div>
        @endif
        <div class="mb-4">
            <form method="GET" action="{{ route('articles.index') }}">
                <label for="sort_by" class="block text-gray-800 font-bold">Sort by:</label>
                <select name="sort_by" id="sort_by" class="border border-gray-300 rounded py-2 px-3">
                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date</option>
                    <option value="category_id" {{ request('sort_by') == 'category_id' ? 'selected' : '' }}>Category
                    </option>
                </select>
                <button type="submit" class="ml-2 bg-indigo-500 text-white py-2 px-4 rounded">Sort</button>
            </form>
        </div>
        @if ($articles->count())
            <div class="bg-white shadow-md rounded-md p-6 grid grid-cols-4 gap-4 w-full">
                @foreach ($articles as $article)
                    <div class="mb-6 border-b pb-4">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                            class="w-full h-48 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $article->title }}</h3>
                        <p class="text-gray-700 mt-1">Category: {{ $article->category->name ?? 'Sans catégorie' }}</p>
                        <p class="text-gray-600 mt-1">{{ $article->created_at->format('F j, Y') }}</p>
                        <p class="text-gray-800 mt-2">{{ Str::limit($article->content, 150) }}</p>
                        <div class="bg-green-700 text-white">
                            <a href="{{ route('articles.edit', $article) }}" class="bg-blue-500
                                text-white py-2 px-4 rounded">Update
                            </a>
                            </form>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="delete" class="bg-red-800 text-white py-2 px-4 rounded">Delete</button>
                                @if($errors->has('delete'))
                                    <span class="text-red-700">
                                        {{$errors->first('delete')}}
                                    </span>
                                @endif
                            </form>
                        </div>
                    </div>
                @endforeach
                <!-- Pagination Links -->
            </div>
        @else
            <p class="text-gray-700">No articles found.</p>
        @endif
    </div>
</div>
@include('partials.footer')
