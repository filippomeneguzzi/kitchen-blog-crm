<nav class="bg-panna w-full fixed border-black z-100 border-b">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/10249940.jpg') }}" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-black">BB Kitchen</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden focus:outline-none"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-black md:p-0">Home</a>
                </li>
                @hasrole('admin')
                    <li>
                        <a href="{{ route('admin.recipes.index') }}"
                            class="block py-2 px-3 text-black rounded-sm md:border-0 md:p-0">Recipes</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="block py-2 px-3 text-black rounded-sm md:border-0 md:p-0">Categorie</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="block py-2 px-3 text-black rounded-sm md:border-0 md:p-0">Users</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('recipes') }}" class="block py-2 px-3 text-black rounded-sm md:border-0 md:p-0">Recipes</a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="block py-2 px-3 text-black rounded-sm md:border-0 md:p-0">Categorie</a>
                    </li>
                @endhasrole
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="block py-2 px-3 text-black rounded-sm md:border-0 md:p-0">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="block py-2 px-3 text-black rounded-sm md:border-0 md:p-0">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
