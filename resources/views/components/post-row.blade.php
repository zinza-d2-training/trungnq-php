<div class="gird grid-cols-12">
    <div class="grid grid-cols-12 gap-4 h-20 border-y-2 border-x-2 ">
        <div class="col-span-7 flex flex-col content-center my-auto ml-9">
            <div class="w-3/5">
                <a href="{{route('post.show',['post'=>$post->id])}}" class="font-bold">{{ $post->title }}</a>
                <div class="font-normal h-6 truncate">{!! $post->description !!}</div>
            </div>
        </div>
        <div class="col-span-5 flex items-center">
            <div class="">
                <button class="pin-post" data-id="{{$post->id}}" data-tooltip-target="tooltip-post">
                    <span class="text-3xl {{($post->pin == 0) ? 'text-gray-300 hover:text-blue-700' : 'text-blue-400 hover:text-gray-700' }}  "><i class="fa-solid fa-syringe"></i></span>
                </button>
                <div id="tooltip-post" role="tooltip"
                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700"
                    data-popper-placement="top"
                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(502px, -179px);">
                        {{($post->pin ==0) ? "pin" : "unpin"}}
                    <div class="tooltip-arrow" data-popper-arrow=""
                        style="position: absolute; left: 0px; transform: translate(59px, 0px);">
                    </div>
                </div>
            </div>
            <div class=" text-center px-3">
                <p class="text-gray-500">Commnents</p>
                <p class="font-bold text-base">{{ $post->comments_count }}</p>
            </div>
            <div class="">
                <img src="/storage/images/avatars/{{ $post->user->avatar }}" data-tooltip-target="tooltip-default"
                    alt=""  class="rounded-full w-10 mr-3 ">
                <div id="tooltip-default" role="tooltip"
                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700"
                    data-popper-placement="top"
                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(502px, -179px);">
                    {{ $post->user->name }}
                    <div class="tooltip-arrow" data-popper-arrow=""
                        style="position: absolute; left: 0px; transform: translate(59px, 0px);">
                    </div>
                </div>
            </div>
            <div class=" overflow-hidden">
                <p class="font-bold truncate "><a href="{{route('post.show',['post'=>$post->id])}}" >{{ $post->title }}</a></p>
                <p class="text-gray-500 text-sm">{{ $post->created_at }}</p>
            </div>
        </div>
    </div>
</div>
