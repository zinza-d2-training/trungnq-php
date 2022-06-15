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
        <form action="{{ route('topic.store') }}" class="flex flex-col w-1/5" method="POST">
            @method('POST')
            @csrf
            <x-label>Tilte</x-label>
            <x-input class="block mt-1 w-full" type="text" name="title" id="title" required autofocus />
            <x-span-error class="text-red-500" name='title'></x-span-error>
            <x-button>Create</x-button>
        </form>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
