@vite('resources/css/app.css')

<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        @if(session()->has('status'))
            <div class="bg-green-800 text-white p-4 rounded-md mb-6" role="alert">
                {{ session()->get('status') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-md p-6">
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900">Create New Article</h2>
            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block text-gray-800 font-bold">Title</label>
                    <input type="text" name="title" id="title" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600" required />
                    @error('title')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-gray-800 font-bold">Content</label>
                    <textarea name="content" id="content" rows="4" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600" required></textarea>
                    @error('content')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="image" class="block text-gray-800 font-bold">Image</label>
                    <input type="file" name="image" id="image" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600" />
                    @error('image')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category" class="block text-gray-800 font-bold">Category (optional)</label>
                    <input type="text" name="category" id="category" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600" />
                    @error('category')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded">Create Article</button>
            </form>
        </div>
    </div>
</div>
