@extends('layouts.client')
@section('title')
    Create Post
@endsection
@section('content')
    <x-breadcrumbs name='createpost'></x-breadcrumbs>
    <div class="px-6 mb-6 ">
        <div class=" my-4 py-2  flex flex-row justify-between">
            <div class="">
                <p class="font-bold">Post {{ $post->title }}</p>
                <p class="text-gray-400">{{ $post->created_at }}</p>
            </div>
            @if (Auth::user()->role->name == 'admin' || Auth::id() == $post->user->id || (Auth::user()->role->name == 'company_account' && $post->user->company[0]->id == Auth::user()->company[0]->id))
                <div class="">
                    <button class="delete-post bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-700"
                        post_id="{{ $post->id }}">Delete</button>
                </div>
            @endif
        </div>

        <div class="bg-slate-300 p-2">
            @php
                $author = $post->user;
                $auth = Auth::id();
                if (!empty($post->comment_resolve)) {
                    $resolve = $post->comment_resolve->id;
                } else {
                    $resolve = null;
                }
            @endphp
            {{-- @if ($comments->onFirstPage()) --}}
            <div class="grid grid-cols-6 gap-4 mb-4 bg-slate-300" id="post" post-id="{{ $post->id }}">
                <div class="p-6 bg-white  ">
                    <div class="d-flex flex-row  justify-center items-end text-center">
                        <div class="mx-auto w-20">
                            <img class="rounded-full" src="/storage/images/avatars/{{ $post->user->avatar }}"
                                alt="">
                        </div>
                        <div>
                            <p class="font-bold">{{ $post->user->name }} (author)</p>
                            @if (isset($post->user->company[0]))
                                <p> {{ $post->user->company[0]->name }}</p>
                            @else
                                <p> Member </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-blue-100 col-span-5">
                    <div class="mb-2">
                        @foreach ($post->tag as $item)
                            <span class="px-2 py-1 border-2 rounded-full"
                                style="background-color: {{ $item->color }}">{{ $item->name }}</span>
                        @endforeach
                    </div>
                    <div class="">{!! $post->description !!}</div>
                </div>
            </div>
            {{-- @endif --}}

            @if (count($comments))
                @foreach ($comments as $item)
                    @php
                        if (count($item->like)) {
                            $like = true;
                        } else {
                            $like = false;
                        }
                    @endphp
                    <x-comment :item="$item" :like="$like" :auth="$auth" :author="$author" :resolve="$resolve">
                    </x-comment>
                @endforeach
            @endif

            {{-- write comment --}}
            <div class="grid grid-cols-6 gap-4 mb-2 bg-slate-300">
                <div class="p-6 bg-white  ">
                    <div class="d-flex flex-row  justify-center items-end text-center">
                        <div class="mx-auto w-20">
                            <img class="rounded-full" src="/storage/images/avatars/{{ Auth::user()->avatar }}"
                                alt="">
                        </div>
                        <div>
                            <p class="font-bold">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-6  col-span-5 bg-white">
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        {{-- <input type="hidden" name="last_page" value="{{$comments->lastPage()}}"> --}}
                        <textarea name="description" class="w-full" id="" rows="5" placeholder="write a comments"></textarea>
                        <x-span-error name='description'></x-span-error>
                        <button type="submit" class="float-right bg-blue-400 text-white py-2 px-4 rounded-lg">Send</button>
                    </form>
                </div>
            </div>

            <div class="mt-auto mb-6 px-6">
                {{-- {{ $comments->links() }} --}}
            </div>
        </div>
    </div>
@endsection
