@extends('layouts.client')
@section('title')
    Dashboard
@endsection
@section('content')
    {{ Breadcrumbs::render('home') }}
    <div class="grid grid-cols-5 gap-x-2.5 p-2 bg-slate-50">
        <div class="col-span-4 pl-6">
            <div class="table-data  mb-2.5 ">
                <div class="gird gird-cols-12 bg-slate-400 py-2 px-6">
                    All topic
                </div>
                <div class="gird grid-cols-12 ">
                    @foreach ($topics as $item)
                        <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2 ">
                            <div class="col-span-7 flex items-center ml-9">
                                <a href="{{ route('topic.show', ['topic' => $item->slug]) }}"
                                    class="font-bold">{{ $item->title }}</a>
                            </div>
                            <div class="col-span-5 flex flex-row items-center">
                                <div class=" text-center pr-5">
                                    <p class="text-gray-400">Post</p>
                                    <p class="font-bold text-base">{{ $item->post_count }}</p>
                                </div>
                                <div class=" text-center mr-4">
                                    <p class="text-gray-400">Commnents</p>
                                    <p class="font-bold text-base">{{ $item->comments_count }}</p>
                                </div>
                                @if (count($item->post))
                                    <div class="flex flex-row">
                                        <div class="mr-4">
                                            <img src="storage/images/avatars/{{ $item->post[0]->user->avatar }}"
                                            data-tooltip-target="tooltip-author" alt="" class="w-10 rounded-full">
                                        </div>
                                        <div id="tooltip-author" role="tooltip"
                                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700"
                                            data-popper-placement="top"
                                            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(502px, -179px);">
                                            {{ $item->post[0]->user->name }}
                                            <div class="tooltip-arrow" data-popper-arrow=""
                                                style="position: absolute; left: 0px; transform: translate(59px, 0px);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" truncate">
                                        <a href="{{ route('post.show', ['post' => $item->post[0]->id]) }}"
                                            class="truncate">{{ $item->post[0]->title }}</a>
                                        <p class="text-sm">{{ $item->post[0]->created_at }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @foreach ($topics as $item)
                <div class="table-data  mb-4  ">
                    <div class="gird gird-cols-12 bg-slate-400 py-2 px-6">
                        {{ $item->title }}
                    </div>
                    @if (count($item->post))
                        @foreach ($item->post as $postItem)
                            <x-post-row :post="$postItem"></x-post-row>
                        @endforeach
                    @else
                        <h4 class="p-3 border-2"><i>Chưa có bài viết thuộc topic này</i></h4>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="col-span-1 border-l-2 pl-2 ">
            <p class="uppercase text-lg font-bold"> Laster post</p>
            @if (!count($latestPost))
                <p class="p-3">Chưa có bài đăng nào</p>
            @endif
            @foreach ($latestPost as $post)
                <x-laster-post :post="$post"></x-laster-post>
            @endforeach

            <p class="uppercase text-lg font-bold">Top user</p>
            @if (!count($topusers))
                <i class="px-3">Trống</i>
            @endif
            @foreach ($topusers as $member)
                
            @endforeach
        </div>
    </div>
@endsection
