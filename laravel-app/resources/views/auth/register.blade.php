@vite('resources/css/app.css')
<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        @if(session()->has('success'))
            <div class="bg-green-800 text-green" role="alert">
                {{session()->get('success')}}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="bg-green-800 text-green" role="alert">
                {{session()->get('error')}}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-md p-6">
            <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">Register</h2>
            <form class="space-y-6" method="POST" action="{{route('register.post')}}">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="mt-1">
                        <input name="username" type="username" required placeholder="Pierre"
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            @if($errors->has('username'))
                                <span class="text-red-700">
                                    {{$errors->first('username')}}
                                </span>
                            @endif
                        </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input name="email" type="email-address" autocomplete="email-address" required placeholder="jose@gmail.com"
                        class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        @if($errors->has('email'))
                            <span class="text-red-700">
                                {{$errors->first('email')}}
                            </span>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input name="password" type="password" autocomplete="password" required
                        class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        @if($errors->has('password'))
                            <span class="text-red-700">
                                {{$errors->first('password')}}
                            </span>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="mt-1">
                        <input name="password_confirmation" type="password" autocomplete="confirm-password" required
                        class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        @if($errors->has('password_confirmation'))
                            <span class="text-red-700">
                                {{$errors->first('password_confirmation')}}
                            </span>
                        @endif
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md border border-transparent bg-sky-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">Register
                        Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
