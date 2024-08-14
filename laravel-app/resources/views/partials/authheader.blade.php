@vite('resources/css/app.css')
<header class='flex shadow-md py-4 px-4 sm:px-10 bg-white font-[sans-serif] min-h-[70px] tracking-wide relative z-50'>

    <div class='flex justify-between gap-5 w-full'>

        <div class="">
            <a href="{{ route('home') }}"><svg fill="#1a5fb4" width=auto height="50px" viewBox="-3.84 -3.84 39.68 39.68"
                    xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" stroke="#1a5fb4"
                    stroke-width="0.00032">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)">
                        <rect x="-3.84" y="-3.84" width="39.68" height="39.68" rx="19.84" fill="#7ed0ec"
                            strokewidth="0"></rect>
                    </g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
                        stroke-width="0.192">
                        <path
                            d="M16 25.093c-8.839 0-16-4.796-16-10.719 0-5.916 7.161-10.713 16-10.713s16 4.797 16 10.713c0 5.923-7.161 10.719-16 10.719zM18.448 7.849c-6.713 0-12.161 3.281-12.161 7.328s5.448 7.328 12.161 7.328c6.713 0 11.677-2.245 11.677-7.328 0-5.084-4.959-7.328-11.677-7.328zM24.364 20.26c0.527 0.156 1.037 0.349 1.537 0.579 0.287 0.14 0.547 0.328 0.776 0.552 0.14 0.151 0.26 0.323 0.353 0.511l3.819 6.437h-6.172l-2.885-5.417c-0.265-0.473-0.584-0.911-0.953-1.307-0.188-0.208-0.453-0.333-0.735-0.333h-1.464v7.052l-5.457 0.005v-18.021h10.963c0 0 4.991 0.089 4.991 4.839 0.009 2.693-2.079 4.932-4.772 5.104zM21.995 14.224h-3.307v3.063h3.307c0.86 0.011 1.557-0.699 1.532-1.557 0.047-0.865-0.672-1.568-1.532-1.505z">
                        </path>
                    </g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M16 25.093c-8.839 0-16-4.796-16-10.719 0-5.916 7.161-10.713 16-10.713s16 4.797 16 10.713c0 5.923-7.161 10.719-16 10.719zM18.448 7.849c-6.713 0-12.161 3.281-12.161 7.328s5.448 7.328 12.161 7.328c6.713 0 11.677-2.245 11.677-7.328 0-5.084-4.959-7.328-11.677-7.328zM24.364 20.26c0.527 0.156 1.037 0.349 1.537 0.579 0.287 0.14 0.547 0.328 0.776 0.552 0.14 0.151 0.26 0.323 0.353 0.511l3.819 6.437h-6.172l-2.885-5.417c-0.265-0.473-0.584-0.911-0.953-1.307-0.188-0.208-0.453-0.333-0.735-0.333h-1.464v7.052l-5.457 0.005v-18.021h10.963c0 0 4.991 0.089 4.991 4.839 0.009 2.693-2.079 4.932-4.772 5.104zM21.995 14.224h-3.307v3.063h3.307c0.86 0.011 1.557-0.699 1.532-1.557 0.047-0.865-0.672-1.568-1.532-1.505z">
                        </path>
                    </g>
                </svg>
            </a>
        </div>

        <div>
            <ul class="flex item-align ">
                <li class=' max-lg:py-3 px-3'>
                    <a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-[#007bff] block font-semibold text-[15px] decoration-0'>Home</a>
                </li>
                <li class='max-lg:py-3 px-3'>
                    <a href="{{ route('articles.create') }}"
                        class='hover:text-[#007bff]  decoration-0 text-[#007bff] block font-semibold text-[15px]'>Create_articles
                    </a>
                </li>
            </ul>
        </div>


        <div class=''>
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button
                    class='px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>Logout</button>
            </a>
        </div>
    </div>
</header>
</head>
