<div class="grid grid-cols-6 gap-4 mb-2 bg-slate-300">
    <div class="p-6 bg-white  ">
        <div class="d-flex flex-row  justify-center items-end text-center">
            <div class="mx-auto w-20">
                <img class="rounded-full" src="/storage/images/avatars/{{ $item->user->avatar }}" alt="">
            </div>
            <div>
                @php
                    
                @endphp
                <p class="font-bold">{{ $item->user->name }} </p>
                @if (isset($item->user->company[0]))
                    <p> {{ $item->user->company[0]->name }}</p>
                @else
                    <p> Member </p>
                @endif
            </div>
        </div>
    </div>
    <div class="px-6 py-2 bg-white col-span-5 flex flex-col">
        <div class="flex justify-between">
            <div class="">
                <p class="text-sm text-gray-400">{{ $item->created_at }}</p>
            </div>
            <div class="">
                @if (Auth::id() == $author->id)
                    <span
                        class="text-2xl click-resolve {{ $resolve == $item->id ? 'text-green-400 hover:text-gray-400' : 'text-gray-400 hover:text-green-600' }} px-2"
                        data-id="{{ $item->id }}">
                        <i class="fa-solid fa-check-double"></i>
                    </span>
                @endif
                <span class="text-2xl text-red-500 cursor-pointer favorite">
                    <i class="like-comment icon fa-{{ $like ? 'solid' : 'regular' }} fa-heart"
                        data-comment-id="{{ $item->id }}" data-user-id="{{ $auth }}"
                        data-status="{{ $like ? '1' : '0' }}"></i>
                    <span class="text-red-500 comment-favorite"
                        count="{{ $item->favorite }}">{{ $item->favorite }}</span>
                </span>
            </div>
        </div>
        <div class="whitespace-pre">{!! $item->description !!}</div>
    </div>
</div>
