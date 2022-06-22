@extends('layouts.client')
@section('title')
    Topic
@endsection
@section('content')
    <x-breadcrumbs name='topic'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <div class="font-bold my-5">Topic detail</div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <div class="grid grid-cols-5 gap-x-2.5     p-2 bg-slate-50">
            <div class="col-span-4 pl-6">
                <div class="table-data  mb-2.5 ">
                    @if (count($topic->post))
                        @foreach ($topic->post as $item)
                            <x-post-row :post="$item"></x-post-row>
                        @endforeach
                    @endif
                   
                </div>
            </div>
            <div class="col-span-1 border-l-4 pl-2 ">
                <p class="uppercase text-lg font-bold"> Laster post</p>
                @if (count($topic->post))
                    @php
                        $index=0;
                    @endphp

                    @foreach ($topic->post as $item)
                    <div class="flex flex-col gap-y-2.5 cursor-pointer mb-3">
                        <a href="" class="font-bold text-base ">{{$item->title}}</a>
                        <a href="" class=" text-sm truncate">{!!$item->description!!} </a>
                        <p class="text-gray-400 text-sm">{{$item->created_at}}</p>
                        <img src="/images/image6.svg" alt="" width="27px">
                    </div>
                    <hr>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
@endsection
