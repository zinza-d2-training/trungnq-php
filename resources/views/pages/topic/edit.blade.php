@extends('layouts.client')
@section('title')
    Topic
@endsection
@section('content')
    <x-breadcrumbs name='edittopic' :param="$topic->id"></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <div class="font-bold my-5">Edit topic</div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <form action="{{ route('topic.update', ['topic' => $topic->slug]) }}" class="flex flex-col w-1/5" method="POST">
            @method('PUT')
            @csrf
            <x-label>Tilte</x-label>
            <x-input class="block mt-1 w-full" type="text" name="title" id="title" :value="$topic->title" required autofocus />
            <x-span-error class="text-red-500" name='title'></x-span-error>
            <x-button>Create</x-button>
        </form>
    </div>
@endsection
