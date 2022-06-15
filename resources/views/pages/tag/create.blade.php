@extends('layouts.client')
@section('title')
    Tag
@endsection
@section('content')
    <x-breadcrumbs name='tag'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <div class="font-bold my-5">Create tag</div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <form action="{{ route('tag.store') }}" class="flex flex-col w-1/5" method="POST">
            @method('POST')
            @csrf
            <div class="mb-4">
                <x-label>Tag name</x-label>
                <x-input class="block mt-1 w-full" type="text" name="name" id="name" required autofocus />
                <x-span-error class="text-red-500" name='name'></x-span-error>
            </div>
            <div class="mb-4">
                <x-label>Tag color</x-label>
                <input type="color" class="w-full rounded-lg h-10 " name="color" id="color" value="#cccccc">
            </div>
            <x-button>Create</x-button>
        </form>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
