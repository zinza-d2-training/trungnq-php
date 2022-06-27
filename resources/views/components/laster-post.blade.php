<div class="flex flex-col gap-y-2.5 cursor-pointer">
    <a href="" class="font-bold text-base ">{{ $post->name }}</a>
    <a href="" class="h-6 text-sm truncate">{!! $post->description !!}</a>
    <p class="text-gray-400 text-sm">{{ $post->created_at }}</p>
    <img src="/storage/images/avatars/{{ $post->user->avatar }}" alt="" width="27px">
    <hr>
</div>
