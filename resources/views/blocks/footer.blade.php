<div class="mt-auto">
    <div class="grid grid-cols-5 " style="background-color: #f1f1f1">
        <div class="col-span-5 p-4 " style="background-color: #E5E6EC">
            @foreach ($listTopic as $key => $item)
                <span class="font-bold text-sm uppercase pr-5"><a
                        href="{{ route('topic.show', ['topic' => $key]) }}">{{ $item }}</a></span>
            @endforeach
        </div>
        <div class="col-span-1 p-4 ">
            <div class="flex flex-col gap-y-2.5">
                <p class="font-bold">Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
            </div>
        </div>
        <div class="col-span-1 p-4 ">
            <div class="flex flex-col gap-y-2.5">
                <p class="font-bold">Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
            </div>
        </div>
        <div class="col-span-1 p-4 ">
            <div class="flex flex-col gap-y-2.5">
                <p class="font-bold">Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
            </div>
        </div>
        <div class="col-span-1 p-4 ">
            <div class="flex flex-col gap-y-2.5">
                <p class="font-bold">Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
            </div>
        </div>
        <div class="col-span-1 p-4 ">
            <div class="flex flex-col gap-y-2.5">
                <p class="font-bold">Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
                <p>Tinh tế</p>
            </div>
        </div>
    </div>
</div>
