@extends('layouts.client')
@section('title')
    Edit post
@endsection
@section('content')
    <x-breadcrumbs name='editpost' :param="$post"></x-breadcrumbs>
    <div class="px-6">
        <div class=" my-4 py-2  flex flex-row justify-between">
            <div class="">Edit post </div>
            <div class="">
                <a href="{{ route('post.index') }}" class="p-2 bg-blue-600 rounded-lg text-white">Back</a>
            </div>
        </div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <form action="{{ route('post.update', ['post' => $post]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="w-1/4 mb-4">
                <x-label>Title</x-label>
                <x-input class="block mt-1 w-full" type="text" name="title" id="title" :value="$post->title" required
                    autofocus />
                <x-span-error class="" name='title'></x-span-error>
            </div>
            <div class="">
                <x-label>Description</x-label>
                <textarea name="description" id="editor" cols="100" rows="5">{{ html_entity_decode($post->description) }}</textarea>
                <x-span-error class="" name='description'></x-span-error>

            </div>
            <div class="w-1/2 flex flex-row gap-2.5 mt-4">
                <div class="w-1/2">
                    <x-label>Topic</x-label>
                    <select name="topic_id" id="topic_id" class="w-full border-2 border-blue-400 rounded-lg">
                        @if (count($topics))
                            @foreach ($topics as $id => $title)
                                <option value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="w-1/2 ">
                    <x-label>Status</x-label>
                    <select name="status" class="w-full border-2 rounded-lg border-blue-400">
                        <option value="1">Resolve</option>
                        <option value="1">Not Resolve</option>
                    </select>
                </div>
            </div>
            <div class="w-1/4 mt-4">
                <x-label>Tags</x-label>
                <select name="tag[]" multiple="multiple" class="tag w-full py-3 border-2 border-blue-400">
                    @if (count($tags))
                        @foreach ($tags as $id => $tag)
                            <option value="{{ $id }}" {{ in_array($id, $tagSelected) ? 'selected' : '' }}>
                                {{ $tag }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="w-1/4">
                <x-button>Update</x-button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('post.uploadImage') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        $(document).ready(function() {
            $('.tag').select2();
        });
    </script>
@endsection
