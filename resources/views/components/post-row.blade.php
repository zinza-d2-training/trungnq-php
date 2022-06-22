<div class="gird grid-cols-12">
    <div class="grid grid-cols-12 gap-4 h-20 border-y-2 border-x-2 ">
        <div class="col-span-8 flex flex-col content-center my-auto ml-9">
            <div class="w-4/5">
                <p class="font-bold">{{ $post->title }}</p>
                <div class="font-normal h-6 truncate">{!! $post->description !!}</div>
            </div>
        </div>
        <div class="col-span-4 flex items-center">
            <div class=" text-center px-3">
                <p class="text-gray-500">Commnents</p>
                <p class="font-bold text-base">{{ $post->comments_count }}</p>
            </div>
            <div class="">
                <img src="storage/images/avatars/{{ $post->user->avatar }}" data-tooltip-target="tooltip-default"
                    alt="" width="44px">
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
            <div class="px-3   ">
                <p class="font-bold">{{ $post->title }}</p>
                <p class="text-gray-500 text-base">{{ $post->created_at }}</p>
            </div>
        </div>
    </div>
</div>
