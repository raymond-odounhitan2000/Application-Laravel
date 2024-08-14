@include('partials.authheader')
<div class="bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center text-xl">Articles</h2><br>
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
        @if ($articles->count())
            <div class="bg-white shadow-md rounded-md p-6 grid grid-cols-1 gap-4 w-full md:grid-cols-2
            lg:grid-cols-3 xl:grid-cols-4 xxl:grid-cols-5">
                @foreach ($articles as $article)
                    <div class="mb-6 border-b pb-4 ">
                        <img src="https://www.dynamique-mag.com/wp-content/uploads/gerer-les-commentaires-et-les-evaluations-en-ligne-780x470.jpg" alt="{{ $article->title }}"
                            class="w-full h-48 object-cover rounded-md mb-4 ">
                        <h3 class="text-xl font-bold text-gray-900">Title:{{ $article->title }}</h3>
                        <p class="text-gray-700 mt-1"><span class="text-black 900">Category:</span> {{ $article->category}}</p>
                        <p class="text-gray-600 mt-1"><span class="text-black 900">Created at:</span>{{ $article->created_at->format('F j, Y') }}</p>
                        <p class="text-gray-800 mt-2"><span class="text-black 900">Content:</span>{{ Str::limit($article->content, 150) }}</p>
                        <div class="bg text-white space-x-4">
                            <a href="{{ route('articles.edit', $article) }}" class="bg-green-500
                            py-2 px-4 rounded">Update
                            </a>
                            </form>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="delete" class="bg-red-800  py-2 px-4 rounded">Delete</button>
                                @if($errors->has('delete'))
                                    <span class="text-red-700">
                                        {{$errors->first('delete')}}
                                    </span>
                                @endif
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-700">No articles found.</p>
        @endif
    </div>
</div>
@include('partials.footer')
