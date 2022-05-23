<header class="flex-shrink-0  border-b dark:border-gray-700">
    <div class="flex h-[72px] items-center justify-between p-2">
        <!-- Navbar left -->
        <div class="flex items-center ">

            <!-- Toggle sidebar button -->
            <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">

                <svg  class="w-6 h-6 text-gray-600 dark:text-gray-400"
                      :class="{'hidden transform transition-transform -rotate-180': isSidebarOpen}"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                </svg>

                <svg :class="{'hidden transform transition-transform -rotate-180': !isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>

            </button>
            <span class="flex p-2 items-center justify-start text-md font-semibold uppercase lg:hidden text-gray-800 dark:text-gray-200 ml-0"><img class="flex w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{asset('storage/images/logo-circle.svg')}}"
                                                                                                                                               alt="Bordered avatar"><span class="ml-3">ED-Manager</span></span>
        </div>

        <!-- Mobile search box -->
{{--        <div--}}
{{--            x-show.transition="isSearchBoxOpen"--}}
{{--            class="fixed inset-0 z-10 bg-black bg-opacity-20"--}}
{{--            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"--}}
{{--        >--}}
{{--            <div--}}
{{--                @click.away="isSearchBoxOpen = false"--}}
{{--                class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md"--}}
{{--            >--}}
{{--                <div class="flex items-center flex-1 px-2 space-x-2">--}}
{{--                    <!-- search icon -->--}}
{{--                    <span>--}}
{{--                    <svg--}}
{{--                        class="w-6 h-6 text-gray-500"--}}
{{--                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                        fill="none"--}}
{{--                        viewBox="0 0 24 24"--}}
{{--                        stroke="currentColor"--}}
{{--                    >--}}
{{--                      <path--}}
{{--                          stroke-linecap="round"--}}
{{--                          stroke-linejoin="round"--}}
{{--                          stroke-width="2"--}}
{{--                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"--}}
{{--                      />--}}
{{--                    </svg>--}}
{{--                  </span>--}}
{{--                    <input--}}
{{--                        type="text"--}}
{{--                        placeholder="Search"--}}
{{--                        class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"--}}
{{--                    />--}}
{{--                </div>--}}
{{--                <!-- close button -->--}}
{{--                <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">--}}
{{--                    <svg--}}
{{--                        class="w-4 h-4 text-gray-500"--}}
{{--                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                        fill="none"--}}
{{--                        viewBox="0 0 24 24"--}}
{{--                        stroke="currentColor"--}}
{{--                    >--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Desktop search box -->
{{--        <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">--}}
{{--            <!-- search icon -->--}}
{{--            <span>--}}
{{--                <svg--}}
{{--                    class="w-5 h-5 text-gray-500"--}}
{{--                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                    fill="none"--}}
{{--                    viewBox="0 0 24 24"--}}
{{--                    stroke="currentColor"--}}
{{--                >--}}
{{--                  <path--}}
{{--                      stroke-linecap="round"--}}
{{--                      stroke-linejoin="round"--}}
{{--                      stroke-width="2"--}}
{{--                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"--}}
{{--                  />--}}
{{--                </svg>--}}
{{--              </span>--}}
{{--            <input--}}
{{--                type="text"--}}
{{--                placeholder="Search"--}}
{{--                class="px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border"--}}
{{--            />--}}
{{--        </div>--}}

        <!-- Navbar right -->
        <div class="relative flex items-center space-x-3">
            <!-- Search button -->
{{--            <button--}}
{{--                @click="isSearchBoxOpen = true"--}}
{{--                class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200"--}}
{{--            >--}}
{{--                <svg--}}
{{--                    class="w-6 h-6 text-gray-500"--}}
{{--                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                    fill="none"--}}
{{--                    viewBox="0 0 24 24"--}}
{{--                    stroke="currentColor"--}}
{{--                >--}}
{{--                    <path--}}
{{--                        stroke-linecap="round"--}}
{{--                        stroke-linejoin="round"--}}
{{--                        stroke-width="2"--}}
{{--                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"--}}
{{--                    />--}}
{{--                </svg>--}}
{{--            </button>--}}

            <div class="items-center hidden space-x-3 md:flex">
                <!-- Notification Button -->
{{--                <div class="relative" x-data="{ isOpen: false }">--}}
{{--                    <!-- red dot -->--}}
{{--                    <div class="absolute right-0 p-1 bg-red-400 rounded-full animate-ping"></div>--}}
{{--                    <div class="absolute right-0 p-1 bg-red-400 border rounded-full"></div>--}}
{{--                    <button--}}
{{--                        @click="isOpen = !isOpen"--}}
{{--                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"--}}
{{--                    >--}}
{{--                        <svg--}}
{{--                            class="w-6 h-6 text-gray-500"--}}
{{--                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                            fill="none"--}}
{{--                            viewBox="0 0 24 24"--}}
{{--                            stroke="currentColor"--}}
{{--                        >--}}
{{--                            <path--}}
{{--                                stroke-linecap="round"--}}
{{--                                stroke-linejoin="round"--}}
{{--                                stroke-width="2"--}}
{{--                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"--}}
{{--                            />--}}
{{--                        </svg>--}}
{{--                    </button>--}}

{{--                    <!-- Dropdown card -->--}}
{{--                    <div--}}
{{--                        @click.away="isOpen = false"--}}
{{--                        x-show.transition.opacity="isOpen"--}}
{{--                        class="absolute  max-w-md mt-3 transform bg-white dark:bg-gray-700 rounded-md shadow-lg -translate-x-3/4 min-w-max"--}}
{{--                    >--}}
{{--                        <div class="p-4 font-medium border-b">--}}
{{--                            <span class="text-gray-800">Notification</span>--}}
{{--                        </div>--}}
{{--                        <ul class="flex flex-col p-2 my-2 space-y-1">--}}
{{--                            <li>--}}
{{--                                <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">--}}
{{--                            <a href="#">See All</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Services Button -->
{{--                <div x-data="{ isOpen: false }">--}}
{{--                    <button--}}
{{--                        @click="isOpen = !isOpen"--}}
{{--                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"--}}
{{--                    >--}}
{{--                        <svg--}}
{{--                            class="w-6 h-6 text-gray-500"--}}
{{--                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                            fill="none"--}}
{{--                            viewBox="0 0 24 24"--}}
{{--                            stroke="currentColor"--}}
{{--                        >--}}
{{--                            <path--}}
{{--                                stroke-linecap="round"--}}
{{--                                stroke-linejoin="round"--}}
{{--                                stroke-width="2"--}}
{{--                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"--}}
{{--                            />--}}
{{--                        </svg>--}}
{{--                    </button>--}}

{{--                    <!-- Dropdown -->--}}
{{--                    <div--}}
{{--                        @click.away="isOpen = false"--}}
{{--                        @keydown.escape="isOpen = false"--}}
{{--                        x-show.transition.opacity="isOpen"--}}
{{--                        class="absolute mt-3 transform bg-white dark:bg-gray-700 rounded-md shadow-lg -translate-x-3/4 min-w-max"--}}
{{--                    >--}}
{{--                        <div class="p-4 text-lg font-medium border-b">Web apps & services</div>--}}
{{--                        <ul class="flex flex-col p-2 my-3 space-y-3">--}}
{{--                            <li>--}}
{{--                                <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">--}}
{{--                          <span class="block mt-1">--}}
{{--                            <svg--}}
{{--                                class="w-6 h-6 text-gray-500"--}}
{{--                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                fill="none"--}}
{{--                                viewBox="0 0 24 24"--}}
{{--                                stroke="currentColor"--}}
{{--                            >--}}
{{--                              <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />--}}
{{--                              <path--}}
{{--                                  fill="#fff"--}}
{{--                                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"--}}
{{--                              />--}}
{{--                              <path--}}
{{--                                  stroke-linecap="round"--}}
{{--                                  stroke-linejoin="round"--}}
{{--                                  stroke-width="2"--}}
{{--                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"--}}
{{--                              />--}}
{{--                            </svg>--}}
{{--                          </span>--}}
{{--                                    <span class="flex flex-col">--}}
{{--                            <span class="text-lg">Atlassian</span>--}}
{{--                            <span class="text-sm text-gray-400">Lorem ipsum dolor sit.</span>--}}
{{--                          </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">--}}
{{--                          <span class="block mt-1">--}}
{{--                            <svg--}}
{{--                                class="w-6 h-6 text-gray-500"--}}
{{--                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                fill="none"--}}
{{--                                viewBox="0 0 24 24"--}}
{{--                                stroke="currentColor"--}}
{{--                            >--}}
{{--                              <path--}}
{{--                                  stroke-linecap="round"--}}
{{--                                  stroke-linejoin="round"--}}
{{--                                  stroke-width="2"--}}
{{--                                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"--}}
{{--                              />--}}
{{--                            </svg>--}}
{{--                          </span>--}}
{{--                                    <span class="flex flex-col">--}}
{{--                            <span class="text-lg">Slack</span>--}}
{{--                            <span class="text-sm text-gray-400"--}}
{{--                            >Lorem ipsum, dolor sit amet consectetur adipisicing elit.</span--}}
{{--                            >--}}
{{--                          </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">--}}
{{--                            <a href="#">Show all apps</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Options Button -->
                <div class="relative" >

                    <button
{{--                        x-data="{darkMode:$wire.entangle('darkMode')}"--}}
                        x-on:click="darkMode=!darkMode"

                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-100/[0.2] dark:group-hover:text-gray-300 focus:outline-none focus:ring"
                    >
                        <svg wire:ignore x-cloak x-show="darkMode" class="h-[20px] w-[20px] text-gray-400 " xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                        </svg>
                        <svg wire:ignore x-cloak x-show="!darkMode" class="h-[20px] w-[20px] text-gray-500" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </button>


                </div>
            </div>

            <!-- avatar button -->
            <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none  focus:ring dark:bg-gray-700 dark:focus:ring-gray-600">
                    <img
                        class="object-cover w-8 h-8 rounded-full"
                        src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                        alt="{{auth()->user()->name}}"
                    />
                </button>
                <!-- green dot -->
                <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
                <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

                <!-- Dropdown card -->
                <ul
                    @click.away="isOpen = false"
                    x-show.transition.opacity="isOpen"
                    class="absolute z-40 mt-1 transform -translate-x-40 bg-white dark:bg-gray-800 dark:border-gray-700 rounded-md shadow-md border-gray-200 border min-w-[200px]"
                >
                    <div class="flex items-center justify-center flex-col px-4 py-3  font-medium  dark:border-gray-700">
                        <span class="text-blue-500 text-lg dark:text-yellow-500 capitalize ">{{auth()->user()->name}}</span>
                        <span class="text-sm text-gray-400">{{auth()->user()->email}}</span>
                    </div>
                    <ul class="flex flex-col">
                        <li class="dark:border-gray-700 border-t">
                            <a href="{{route('admin.profile')}}" class="flex items-center text-sm px-4 py-3 transition  text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-100/[0.1] dark:text-gray-300 dark:hover:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                My Profile
                            </a>
                        </li>
                        <li class="dark:border-gray-700 border-t">
                            <a href="#" class="flex items-center text-sm px-4 py-3 transition  text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-100/[0.1] dark:text-gray-300 dark:hover:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Account Settings
                            </a>
                        </li>
                        <li class="dark:border-gray-700 border-t">

                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button  class="flex items-center w-full text-sm px-4 py-3 transition  text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-100/[0.1] dark:text-gray-300 dark:hover:text-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                    </svg>
                                    Logout
                                </button>
                                {{--                                    <x-dropdown-link :href="route('admin-logout')"--}}
                                {{--                                                     onclick="event.preventDefault();--}}
                                {{--                                                this.closest('form').submit();">--}}
                                {{--                                        {{ __('Log Out') }}--}}
                                {{--                                    </x-dropdown-link>--}}
                            </form>

                        </li>
                    </ul>

                </ul>
            </div>
        </div>

    </div>
</header>
