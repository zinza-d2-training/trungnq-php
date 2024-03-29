@extends('layouts.client')
@section('title')
    Post
@endsection
@section('content')
    <x-breadcrumbs name='post'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64"></div>
        <div class="my-5 flex justify-between ">
            <div class="">List post</div>
            <div class="">
                <a href="{{ route('post.create') }}"class="p-3 bg-blue-400 text-white font-bold rounded-lg ">New post</a>
            </div>
        </div>
        @if (count($posts))
            <x-table class="w-full">
                <x-slot name="tablehead" class="w-full">
                    <thead class="text-xs text-gray-900 uppercase bg-slate-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-64 overflow-hidden">
                                <i class="fa-solid fa-user"></i> title
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                <i class="fa-solid fa-user"></i> Author
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                <i class="fa-solid fa-user"></i> Status
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                <i class="fa-solid fa-user"></i> Tags
                            </th>
                            <th scope="col" class="px-6 py-3 w-24">
                                <i class="fa-solid fa-user"></i> ---
                            </th>
                        </tr>
                    </thead>
                </x-slot>

                <x-slot name="tablebody">
                    <tbody class="text-md text-gray-900 text-left">
                        @foreach ($posts as $post)
                            <tr class="border-b-2 post-row">
                                <td class="py-5 px-6 w-64 truncate" style="max-width: 400px">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                </td>
                                <td class="py-5 px-6 text-center"><span class=" text-md font-bold px-3 py-1 rounded-lg">
                                        {{ $post->user->name }}
                                </td>
                                <td class="text-center">
                                    <span
                                        class=" px-3 py-2 text-white font-bold rounded-lg {{ $post->status == 1 ? 'bg-blue-500' : 'bg-fuchsia-600 ' }}">{{ $post->status == 1 ? 'Resolve' : 'Not resolve' }}</span>
                                </td>
                                <td class="text-center">
                                    @if (count($post->tag))
                                        @foreach ($post->tag as $item)
                                            <span class="px-3 py-1 rounded-full"
                                                style="background-color: {{ $item->color }}">{{ $item->name }} </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->role->name == 'admin' || Auth::user()->email == $post->user->email)
                                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="flex items-center text-sm font-medium text-gray-500 ">
                                                        <div><i class="fa-solid fa-ellipsis"></i></div>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link :href="route('post.edit', ['post' => $post])">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>
                                                    <x-dropdown-link>
                                                        <button class="delete-post"
                                                            post_id="{{ $post->id }}">Delete</button>
                                                    </x-dropdown-link>
                                                </x-slot>
                                            </x-dropdown>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-slot>
            </x-table>
        @else
            <h4 class="p-3 border-t-2 "> <i>Chưa có bài đăng.</i> </h4>
        @endif
        <div class="mt-auto px-6">
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
