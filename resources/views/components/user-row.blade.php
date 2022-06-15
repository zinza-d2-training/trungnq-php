@php
if ($user->active == 1) {
    $user->status = 'active';
    $color = 'green';
} else {
    $user->status = 'inactive';
    $color = 'red';
}
if ($user->role->id == 1) {
    $role = 'admin';
    $bg = 'red';
} elseif ($user->role->id == 2) {
    $role = 'company_account';
    $bg = 'blue';
} else {
    $role = 'member';
    $bg = 'teal';
}
@endphp
<tr
    class="user-row border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700" data-id="{{$user->id}}">
    <td scope="row" class="px-6 py-4 ">
        <input type="checkbox" class="mx-auto checkitem" name="" id="" data-id="{{ $user->id }}">
    </td>
    <td class="px-6 py-4">
        <div class="inline-block ">
            <img src="/storage/images/avatars/{{ $user->avatar }}" alt="" class="w-10 rounded-full">
        </div>
        <div class="px-3 inline-block w-3">
            <p class="text-bold text-slate-900">{{ $user->name }}</p>
            <p class=" text-gray-600">{{ $user->email }}</p>
        </div>
    </td>
    <td class="px-6 py-4">
        {{ $user->dob }}
    </td>
    <td class="px-6 py-4">
        <div class=" flex items-center font-bold uppercase ">
            <p class="px-3 bg-{{ $color }}-500   rounded-md">{{ $user->status }}</p>
        </div>
    </td>
    <td class="px-6 py-4 text-right">
        <div class="col-span-2 flex items-center  ">
            <p class="px-3 py-1 {{ 'bg-' . $bg . '-500' }} bg-teal-500 rounded-md capitalize">{{ $role }}</p>
        </div>
    </td>
    <td>
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-gray-500 ">
                        <div><i class="fa-solid fa-ellipsis"></i></div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <!-- Authentication -->
                    <x-dropdown-link :href="route('user.edit', ['id' => $user->id])">
                        {{ __('Edit') }}
                    </x-dropdown-link>
                    <x-dropdown-link>
                        <button class="deleteUser" user_id="{{ $user->id }}">Delete</button>
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>
    </td>
</tr>
