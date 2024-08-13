@vite('resources/css/app.css')

<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        @if(session()->has('success'))
            <div class="bg-green-800 text-white p-4 rounded-md mb-6" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="bg-red-800 text-white p-4 rounded-md mb-6" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-md p-6">
            <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">Login</h2>
            <form class="space-y-6" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-gray-800 font-bold">Email</label>
                    <input type="email" name="email" id="email" placeholder="zoe@gmail.com" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600" />
                    @if($errors->has('email'))
                        <span class="text-red-700">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-800 font-bold">Password</label>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600" />
                    @if($errors->has('password'))
                        <span class="text-red-700">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-6">
                    <a href="{{ route('password.request') }}" class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600">Forget Password?</a>
                </div>
                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded">Login</button>
            </form>
        </div>
    </div>
</div>
