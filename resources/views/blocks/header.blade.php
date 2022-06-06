<div class="div">
    <section class="mx-auto flex flex-row items-center justify-between" style="height: 50px; max-width: 1440px; background-image: linear-gradient(to right, #D51E36, #273494);" >
        <div class="flex flex-row place-content-between items-center">
            <div class="ml-5">
                <ul class="flex">
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black" href="#">Dashboard</a>
                    </li>
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black" href="#">User</a>
                    </li>
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black" href="#">Cpmpany</a>
                    </li>
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black " href="#">Topic</a>
                    </li>
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black " href="#">Tag</a>
                    </li>
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black  " href="#">Post</a>
                    </li>
                  </ul>
            </div>
        </div>
        <div class="hidden sm:flex sm:items-center sm:ml-6 ">
          <form action="">
            <x-input placeholder="Search..." class="mr-6 py-2 pl-3"></x-input>
          </form>
          <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                  <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mr-6 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                      <div class="bg-white rounded-full px-3"><img src="/storage/images/avatars/{{ Auth::user()->avatar }}"  alt="" width="27px" class="rounded-full"></div>
                  </button>
              </x-slot>
              <x-slot name="content">
                      <x-dropdown-link :href="route('account')">
                          {{ __('Setting') }}
                      </x-dropdown-link>
                      <x-dropdown-link :href="route('custom-logout')">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
              </x-slot>
          </x-dropdown>
      </div>
      </section>
      
      <nav class="flex pl-6 py-2 bg-slate-100 " aria-label="Breadcrum b">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              Home /
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects /</a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
            </div>
          </li>
        </ol>
      </nav>
</div>