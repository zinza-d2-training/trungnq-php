@extends("layouts.client")
@section('title')
    {{$title}}
@endsection
@section('content')
    {{-- @include('') --}}
    <x-toast class="bg-red-100 right-64 top-24 absolute"></x-toast>
 {{--    <x-toast class="bg-green-100"></x-toast>
    <x-toast class="bg-blue-100"></x-toast>
    <x-toast class="bg-orange-100"></x-toast> --}}
    <div class="grid grid-cols-5 gap-x-2.5     p-2 bg-slate-50">
        <div class="col-span-4 pl-6">
            <div class="table-data  mb-2.5 ">
                <div class="gird gird-cols-12 bg-slate-400 py-2 px-6">
                    All topic
                </div>
                <div class="gird grid-cols-12">
                    <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2 ">
                        <div class="col-span-7 flex items-center ml-9">
                            <p class="font-bold">Topic name</p>
                        </div>
                        <div class="col-span-5 flex items-center">
                           <div class=" text-center pr-5">
                               <p class="text-gray-400">Post</p>
                               <p class="font-bold text-base">1000</p>
                           </div>
                           <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3   ">
                                <p class="text-bold">Post 1</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2">
                        <div class="col-span-7 flex items-center ml-9">
                            <p class="font-bold">Topic name</p>
                        </div>
                        <div class="col-span-5 flex items-center">
                           <div class=" text-center pr-5">
                               <p class="text-gray-400">Post</p>
                               <p class="font-bold text-base">1000</p>
                           </div>
                           <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3   ">
                                <p class="text-bold">Post 1</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2">
                        <div class="col-span-7 flex items-center ml-9">
                            <p class="font-bold">Topic name</p>
                        </div>
                        <div class="col-span-5 flex items-center">
                           <div class=" text-center pr-5">
                               <p class="text-gray-400">Post</p>
                               <p class="font-bold text-base">1000</p>
                           </div>
                           <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3   ">
                                <p class="text-bold">Post 1</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2">
                        <div class="col-span-7 flex items-center ml-9">
                            <p class="font-bold">Topic name</p>
                        </div>
                        <div class="col-span-5 flex items-center">
                           <div class=" text-center pr-5">
                               <p class="text-gray-400">Post</p>
                               <p class="font-bold text-base">1000</p>
                           </div>
                           <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3   ">
                                <p class="text-bold">Post 1</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-data  mb-2.5">
                <div class="gird gird-cols-12 bg-slate-400 py-2 px-6">
                    Laravel 
                </div>
                <div class="gird grid-cols-12">
                    <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2 ">
                        <div class="col-span-7 flex flex-col content-center my-auto ml-9">
                            <div>
                                <p class="font-bold">Topic name</p>
                                <p class="font-normal h-6 truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo ullam assumenda deleniti in eaque, nostrum deserunt veritatis magnam quia dolorem accusamus, aperiam, natus incidunt! Amet saepe nam tempore labore reiciendis.</p>
                            </div>
                        </div>
                        <div class="col-span-5 flex items-center">
                           <div class=" text-center pr-5">
                               <p class="text-gray-400">Post</p>
                               <p class="font-bold text-base">1000</p>
                           </div>
                           <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3   ">
                                <p class="text-bold">Post 1</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2 ">
                        <div class="col-span-7 flex flex-col content-center my-auto ml-9">
                            <div>
                                <p class="font-bold">Topic name</p>
                                <p class="font-normal h-6 truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo ullam assumenda deleniti in eaque, nostrum deserunt veritatis magnam quia dolorem accusamus, aperiam, natus incidunt! Amet saepe nam tempore labore reiciendis.</p>
                            </div>
                        </div>
                        <div class="col-span-5 flex items-center">
                           <div class=" text-center pr-5">
                               <p class="text-gray-400">Post</p>
                               <p class="font-bold text-base">1000</p>
                           </div>
                           <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3   ">
                                <p class="text-bold">Post 1</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2 ">
                        <div class="col-span-7 flex flex-col content-center my-auto ml-9">
                            <div>
                                <p class="font-bold">Topic name</p>
                                <p class="font-normal h-6 truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo ullam assumenda deleniti in eaque, nostrum deserunt veritatis magnam quia dolorem accusamus, aperiam, natus incidunt! Amet saepe nam tempore labore reiciendis.</p>
                            </div>
                        </div>
                        <div class="col-span-5 flex items-center">
                           <div class=" text-center pr-5">
                               <p class="text-gray-400">Post</p>
                               <p class="font-bold text-base">1000</p>
                           </div>
                           <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3   ">
                                <p class="text-bold">Post 1</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1 border-l-4 pl-2 ">
           <p class="uppercase text-lg font-bold"> Laster post</p>
           <div class="flex flex-col gap-y-2.5 cursor-pointer" >
               <a href="" class="font-bold text-base ">Post 1</a>
               <a href="" class="h-6 text-sm truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis rerum suscipit alias molestias tempore, aperiam quas aliquid accusamus reprehenderit mollitia possimus neque natus sit vel? Nam tenetur ea beatae et! </a>
               <p class="text-gray-400 text-sm">11/11/1111</p>
               <img  src="/images/image6.svg" alt="" width="27px">
           </div>
           <div class="flex flex-col gap-y-2.5 cursor-pointer" >
            <a href="" class="font-bold text-base ">Post 1</a>
            <a href="" class="h-6 text-sm truncate">Title </a>
            <p class="text-gray-400 text-sm">11/11/1111</p>
            <img  src="/images/image6.svg" alt="" width="27px">
             </div>
            <div class="flex flex-col gap-y-2.5 cursor-pointer" >
                <a href="" class="font-bold text-base ">Post 1</a>
                <a href="" class="h-6 text-sm truncate">Title </a>
                <p class="text-gray-400 text-sm">11/11/1111</p>
                <img  src="/images/image6.svg" alt="" width="27px">
            </div>
            <div class="flex flex-col gap-y-2.5 cursor-pointer" >
                <a href="" class="font-bold text-base ">Post 1</a>
                <a href="" class="h-6 text-sm truncate">Title </a>
                <p class="text-gray-400 text-sm">11/11/1111</p>
                <img  src="/images/image6.svg" alt="" width="27px">
            </div>
        </div>
      </div>
@endsection
