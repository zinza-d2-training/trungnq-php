<div class="flex flex-col gap-y-2.5 cursor-pointer">
    <a href="" class="font-bold text-base ">{{ $post->name }}</a>
    <a href="{{route('post.show',['post'=>$post->id])}}" class="text-md post-title-laster underline">{{ $post->title }} </a>
    <p class="text-gray-400 text-sm">{{ $post->created_at }}</p>
    <img src="/storage/images/avatars/{{ $post->user->avatar }}" alt="" class="w-10 rounded-full border-2">
    <hr>
</div>
