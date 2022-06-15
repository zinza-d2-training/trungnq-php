@extends('layouts.client')
@section('title')
    User management
@endsection
@section('content')
    <x-breadcrumbs name='user'></x-breadcrumbs>
    <div class="px-6">
        <div class=" my-4 py-2  flex flex-row justify-between">
            <div class="">Update user</div>
            <div class=""><a href="{{ route('user.create') }}" target="bank"
                    class="p-2 bg-blue-600 rounded-lg text-white">New user</a></div>
        </div>
        <div id="toast">
        </div>
        <x-table class="w-full">
            <x-slot name="tablehead" class="w-full">
                <thead class="text-xs text-gray-700 uppercase bg-slate-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3 w-3"> 
                            <input type="checkbox" class="mx-auto" name="" id="checkfull">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-user"></i> Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-calendar-day"></i> DOB
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-clock">@sortablelink('active')</i>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-clock"></i> Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
            </x-slot>
            <x-slot name="tablebody">
                @if (count($users))
                    @foreach ($users as $user)
                        <x-user-row :user="$user">
                        </x-user-row>
                    @endforeach
                @endif
            </x-slot>
        </x-table>
        <button type="button" class="bg-blue-400 text-white font-bold p-3 rounded-lg mt-3 ml-4"
            id="btn-delete-mutiple-user">Delete</button>
    </div>
    <div class="mt-auto mb-6 px-6">
        {{ $users->links() }}
    </div>
@endsection
