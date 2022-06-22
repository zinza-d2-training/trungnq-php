@extends('layouts.client')
@section('title')
    Create Post
@endsection
@section('content')
    <x-breadcrumbs name='createpost'></x-breadcrumbs>
    <div class="px-6 ">
        <div class=" my-4 py-2  flex flex-row justify-between">
            <div class="">
                <p class="font-bold">Post {{ $post->title }}</p>
                <p class="text-gray-400">{{ $post->created_at }}</p>
            </div>
            <div class="">
                <a href="{{ route('post.index') }}" class="p-2 bg-blue-600 rounded-lg text-white">Delete</a>
            </div>
        </div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <div class="bg-slate-300 p-2">
            <div class="grid grid-cols-6 gap-4 mb-2 bg-slate-300">
                <div class="p-6 bg-white  ">
                    <div class="d-flex flex-row  justify-center items-end text-center">
                        <div class="mx-auto w-20">
                            <img class="rounded-full" src="/storage/images/avatars/{{ $post->user->avatar }}"
                                alt="">
                        </div>
                        <div>
                            <p>{{ $post->user->name }}</p>
                            <p> {{ $post->user->company[0]->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white col-span-5">
                    <div class="mb-2">
                        @foreach ($post->tag as $item)
                            <span class="px-2 py-1 border-2 rounded-full"
                                style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                        @endforeach
                    </div>
                    <div class="">{!! $post->description !!}</div>
                </div>

            </div>

            <div class="grid grid-cols-6 gap-4 mb-2 bg-slate-300">
                <div class="p-6 bg-white  ">
                    <div class="d-flex flex-row  justify-center items-end text-center">
                        <div class="mx-auto w-20">
                            <img class="rounded-full" src="/storage/images/avatars/{{ $post->user->avatar }}"
                                alt="">
                        </div>
                        <div>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-6  col-span-5 bg-white">
                    <form action="">
                        <textarea name="" id="" cols="105" rows="5" placeholder="write a comments"></textarea>
                        <button class="float-right bg-blue-400 text-white py-2 px-4 rounded-lg">Send</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
