@props(['type' => 'info', 'content' =>'null message' ])
@php
    $icon = "fa-circle-info";
    $color = "blue";
    switch ($type) {
        case "success":
            $color = "green";
            $icon = "fa-circle-check";
            break;
        case "danger":
            $color = "red";
            break;
        case "warning":
            $color = "orange";
            break;
        case "info":
            $color = "blue";
            break;
        default :
            $icon = "fa-question";
    }
@endphp
<div class="flex items-center toast-{{$color}} max-w-sm  p-4 mb-4 text-gray-700 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 absolute right-64 top-24  toast" role="alert">
    <div class="" >
            <i class="fa-solid fa-circle-check fz-24 icon-{{$color}}"></i>
    </div>
    <div class="ml-3 text-base  ">{{$content}}</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5   text-gray-700  hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
