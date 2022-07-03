@extends('layouts.client')
@section('title')
    User management
@endsection
@section('content')
    <x-breadcrumbs name='createuser'></x-breadcrumbs>
    <div id="toast"></div>
    <div class="px-6">
        <div class=" my-4 py-2 ">
            Create user
        </div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <div class="">
            <form action="{{ route('user.create') }}" method="POST">
                @csrf
                <div class="grid grid-cols-8 gap-4 mt-8">
                    <div class="col-span-2">
                        <x-label>Email</x-label>
                        <x-input class="block mt-1 w-full " type="email" name="email" id='email' required
                            autofocus  />
                        <x-span-error class="text-red-500" name='email'></x-span-error>
                    </div>
                    <div class="col-span-2 ">
                        <x-label>Username</x-label>
                        <x-input class="block mt-1 w-full" type="text" name="name" id="name" required autofocus />
                        <x-span-error class="text-red-500" name='name'></x-span-error>
                    </div>
                    <div class="col-span-4 "></div>
                    <div class="col-span-2">
                        <x-label>Role</x-label>
                        <select name="role" id="role" class="w-full rounded-lg border-slate-200">
                            <option value="1"> Admin</option>
                            <option value="2"> Company Accoutn</option>
                            <option value="3" selected> Member</option>
                        </select>
                        <x-span-error class="text-red-500" name='old_password'></x-span-error>
                    </div>
                    <div class="col-span-2">
                        <x-label>Company</x-label>
                        <select name="company" id="company" class="w-full rounded-lg border-slate-200">
                            <option value="0"> Pick an company</option>
                            @if (count($companys))
                                @foreach ($companys as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-span-4">
                    </div>
                    <div class="col-span-2">
                        <x-label>Date of birth</x-label>
                        <input class="border-slate-300 rounded-lg w-full " type="text" name="dob" id="dob"
                            :value="$user - > dob">
                        <x-span-error class="text-red-500" name='dob'></x-span-error>
                    </div>
                    <div class="col-span-2">
                        <x-label>Active</x-label>
                        <select name="active" id="active" class="w-full rounded-lg border-slate-200">
                            <option value="1"> Active</option>
                            <option value="0"> InActive</option>
                        </select>
                        <x-span-error class="text-red-500" name='old_password'></x-span-error>
                    </div>
                    <div class="col-span-4"></div>
                    <div class="col-span-2">
                        <button id="btnUserCreate"
                        class="bg-blue-400 text-white font-bold w-full text-center py-2 mt-5 rounded-lg"
                        type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {});
        flatpickr("#dob", {
            enableTime: false,
            dateFomat: "Y-m-d",
        });
    </script>
@endsection
