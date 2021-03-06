@extends('layouts.client')
@section('title')
    Post
@endsection
@section('content')
    <x-breadcrumbs name='topic'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <div class="font-bold my-5">Search post</div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <div class="grid grid-cols-5 gap-x-2.5     p-2 bg-slate-50">
            <div class="col-span-4 pl-6">
                <div class="table-data  mb-2.5 ">
                    @if (count($posts))
                        @foreach ($posts as $item)
                            <x-post-row :post="$item"></x-post-row>
                        @endforeach
                    @else
                    <i>Không có kết quả tìm kiếm phù hợp</i>
                    @endif
                    
                </div>
            </div>
            <div class="col-span-1 border-l-4 pl-2 ">
                <p class="uppercase text-lg font-bold"> Laster post</p>
                    @foreach ($latestPost as $item)
                        <x-laster-post :post="$item"></x-laster-post>
                    <hr>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
