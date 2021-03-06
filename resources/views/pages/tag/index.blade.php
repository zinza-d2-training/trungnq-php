@extends('layouts.client')
@section('title')
    Tags
@endsection
@section('content')
    <x-breadcrumbs name='tag'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <div class="my-5 flex justify-between ">
            <div class="">List tags</div>
            <div class=""><a href="{{ route('tag.create') }}"
                    class="p-3 bg-blue-400 text-white font-bold rounded-lg ">New tags</a>
            </div>
        </div>
        <hr>
        @if (count($tags))
        <x-table class="w-full">
            <x-slot name="tablehead" class="w-full">
                <thead class="text-xs text-gray-900 uppercase bg-slate-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-16">
                            <input type="checkbox" name="" id="checkfull">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-user"></i> Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-user"></i> Number of post
                        </th>
                        <th scope="col" class="px-6 py-3 w-24">
                        </th>
                    </tr>
                </thead>
            </x-slot>
            <x-slot name="tablebody">
                <tbody class="text-lg text-gray-900 text-left">
                        @foreach ($tags as $item)
                            <tr class="border-b-2 tag-row" data-id="{{ $item->id }}">
                                <td class="py-5 px-6">
                                    <input type="checkbox" name="" class="checkitem" data-id="{{ $item->id }}">
                                </td>
                                <td class="py-5 px-6"><span class=" text-xl px-3 py-1 rounded-lg"
                                        style="background-color: {{ $item->color }}">{{ $item->name }}</span></td>
                                <td class="py-5 px-6">{{$item->post_count}}</td>
                                <td>
                                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 ">
                                                    <div><i class="fa-solid fa-ellipsis"></i></div>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('tag.edit', ['tag' => $item])">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link>
                                                    <button class="delete-tag" tag_id="{{ $item->id }}">Delete</button>
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-slot>
            </x-table>
            <button class="bg-blue-400 text-white border-2 border-slate-500 p-2 my-3 rounded-lg font-bold"
            id="btn-delete-mutiple-tag">Delete Tags</button>
            <div class="mt-auto px-6">
                {{ $tags->links('vendor.pagination.tailwind') }}
            </div>
            @endif
    </div>
@endsection
