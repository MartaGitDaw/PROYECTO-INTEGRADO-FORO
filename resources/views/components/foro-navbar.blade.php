<!-- component -->
<div class="min-h-screen hidden lg:flex flex-col flex-none   text-gray-800 ms:hidden">
    <div class="fixed flex flex-col left-0 w-64 dark:bg-gray-800 h-full shadow-lg mt-0">
        <div class="flex items-center pl-6 h-20 border-b border-gray-300">
            <img src="{{ Auth::user()->profile_photo_url }}" alt=""
                class="rounded-full h-10 w-10 flex items-center justify-center mr-3 border-2 border-blue-500">

            <div class="">
                @if (Route::has('login'))
                @auth
                    <p class="font-medium truncate dark:text-gray-100 font-sans">{{ Auth::user()->name }}</p>
                    @role('admin')
                        <div class="badge">
                            <a href="{{ route('admin.index') }}">
                                <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-800 bg-blue-100 rounded-full">
                                ADMIN
                            </span>
                            </a>
                        </div>
                    @else
                        @role('moderator')
                        <div class="badge">
                            <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-800 bg-blue-100 rounded-full">MODERATOR</span>
                        </div>
                        @endrole
                    @endrole
                @endauth
                @endif
            </div>
        </div>
        <div class="overflow-y-auto overflow-x-hidden flex-grow">
            <ul class="flex flex-col py-6 space-y-1">
                @role('admin')
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="flex font-semibold text-sm dark:text-gray-300 my-4 font-sans uppercase">Admin</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}"
                        class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">Users</span>
                    </a>
                </li>
                @endrole
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="flex font-semibold text-sm dark:text-gray-300 my-4 font-sans uppercase">Dashboard</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show.categories') }}"
                        class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="w-4 inline-flex justify-center items-center ml-4">
                            <i class="fas fa-stream"></i>
                        </span>
                        <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="w-5 inline-flex justify-center items-center ml-4">
                            <i class="far fa-comment"></i>
                        </span>
                        <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">My Threads</span>
                    </a>
                </li>
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="flex font-semibold text-sm dark:text-gray-300 my-4 font-sans uppercase">Settings</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('profile.show') }}"
                        class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">Profile</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                            class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-red-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>