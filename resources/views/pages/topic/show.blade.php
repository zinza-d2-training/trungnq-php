@extends('layouts.client')
@section('title')
    Topic
@endsection
@section('content')
    <x-breadcrumbs name='topic'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <div class="font-bold my-5">Create topic</div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <div class="grid grid-cols-5 gap-x-2.5     p-2 bg-slate-50">
            <div class="col-span-4 pl-6">
                <div class="table-data  mb-2.5 ">
                    <div class="grid grid-cols-12 gap-4 h-20 border-2 ">
                        <div class="col-span-7 flex  items-center ml-9">
                            <div class="truncate">
                                <p class="font-bold">Topic name</p>
                                <p class="max-w-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias, porro aut praesentium itaque ut reiciendis mollitia eveniet alias sequi cum aliquid dolore! A temporibus vitae, qui perspiciatis facilis sint! Totam.</p>
                            </div>
                        </div>
                        <div class="col-span-5 flex items-center float-right">
                            <div class=" text-center px-3">
                                <p class="text-gray-400">Commnents</p>
                                <p class="font-bold text-base">1000</p>
                            </div>
                            <div class="">
                                <img src="/images/image6.svg" alt="" width="44px">
                            </div>
                            <div class="px-3 ">
                                <p class="text-bold">Post 1</p>
                                <p class=" text-base">21/7/7444</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 border-l-4 pl-2 ">
                <p class="uppercase text-lg font-bold"> Laster post</p>
                <div class="flex flex-col gap-y-2.5 cursor-pointer">
                    <a href="" class="font-bold text-base ">Post 1</a>
                    <a href="" class="h-6 text-sm truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis
                        rerum suscipit alias molestias tempore, aperiam quas aliquid accusamus reprehenderit mollitia
                        possimus
                        neque natus sit vel? Nam tenetur ea beatae et! </a>
                    <p class="text-gray-400 text-sm">11/11/1111</p>
                    <img src="/images/image6.svg" alt="" width="27px">
                </div>
            </div>
        </div>
    </div>
@endsection
