@extends('layouts.client')
@section('title')
    Topic
@endsection
@section('content')
    <x-breadcrumbs name='topic'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <div class="my-5 flex justify-between ">
            <div class="">List topic</div>
            <div class=""><a href="{{ route('topic.create') }}"
                    class="p-3 bg-blue-400 text-white font-bold rounded-lg ">New Topic</a></div>
        </div>
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
                    @if (count($topic))
                        @foreach ($topic as $item)
                            <tr class="border-b-2 topic-row border-b-2" data-id="{{$item->slug}}">
                                <td class="py-5 px-6">
                                    <input type="checkbox" name="" class="checkitem" data-id="{{$item->slug}}">
                                </td>
                                <td class="py-5 px-6">{{ $item->title }}</td>
                                <td>10</td>
                                <td>
                                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 ">
                                                    <div><i class="fa-solid fa-ellipsis"></i></div>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('topic.edit', ['topic' => $item])">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link>
                                                    <button class="delete-topic"
                                                        topic_slug="{{ $item->slug }}">Delete</button>
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </x-slot>
        </x-table>
        <button class="bg-blue-400 text-white border-2 border-slate-500 p-3 mt-4 rounded-lg font-bold" id="btn-delete-mutiple-topic">Delete Topic</button>
        <div class="mt-auto px-6">
            {{ $topic->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
