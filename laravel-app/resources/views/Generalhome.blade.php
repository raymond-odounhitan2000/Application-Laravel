
@vite('resources/css/app.css')
    <header
        class='flex shadow-md py-4 px-4 sm:px-10 bg-white font-[sans-serif] min-h-[70px] tracking-wide relative z-50'>
        <div class='flex flex-wrap items-center justify-between gap-5 w-full'>
            <a href="javascript:void(0)"><svg fill="#1a5fb4" width=auto height="50px" viewBox="-3.84 -3.84 39.68 39.68"
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

            <div id="collapseMenu"
                class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
                <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                        <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                        <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                    </svg>
                </button>

                <ul
                    class='lg:flex gap-x-5 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                    <li class='mb-6 hidden max-lg:block'>
                        <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo"
                                class='w-36' />
                        </a>
                    </li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
                        <a href='javascript:void(0)'
                            class='hover:text-[#007bff] text-[#007bff] block font-semibold text-[15px]'>Home</a>
                    </li>
                </ul>
            </div>

            <div class='flex max-lg:ml-auto space-x-3'>
                <a href="{{route('logout')}}">
                <button
                    class='px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>Logout
                </button>
                </a>

                <button id="toggleOpen" class='lg:hidden'>
                    <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>
