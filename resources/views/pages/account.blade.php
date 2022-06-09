@extends('layouts.client')
@section('content')
    <x-breadcrumbs name='account'></x-breadcrumbs>
    <div class="mx-6">
        <div id="toast" class="bg-red-500 right-64">
        </div>
        <form action="{{ route('account-update') }}" id="form-user" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-end gap-2.5">
                <div class="">
                    <h1 class="text-lg font-bold">{{ $user->name }}</h1>
                    <img src="{{ 'storage/images/avatars/' . $user->avatar }}" class="rounded-full" width="92px" alt="">
                </div>
                <div
                    class="file-upload w-9 h-9 rounded-sm  relative d-flex justify-center items-center overflow-hidden mt-auto mx-2">
                    <input type="file" class="image-upload h-9 w-9 absolute  opacity-0 pt-2 cursor-pointer"
                        data-default-file="{{ $user->avatar }}" name="avatar" id="avatar">
                    <img src="images/camera.png" alt="" class="cursor-pointer">
                </div>
            </div>
            <div class="grid grid-cols-8 gap-4 mt-8">
                <div class="col-span-2 ">
                    <x-label>Name</x-label>
                    <x-input class="block mt-1 w-full" type="text" name="name" id="name" :value="$user->name" required
                        autofocus />
                    <x-span-error name='name'></x-span-error>
                </div>
                <div class="col-span-2">
                    <x-label>Email</x-label>
                    <x-input class="block mt-1 w-full bg-slate-300" type="email" :value="$user->email" required autofocus
                        readonly />
                    <x-span-error name='email'></x-span-error>

                </div>
                <div class="col-span-4 "></div>
                <div class="col-span-2">
                    <x-label>Old - Password</x-label>
                    <x-input class="block mt-1 w-full" type="password" name="old_password" id="old_password"
                        :value="old('old_password')" autofocus />
                    <x-span-error name='old_password'></x-span-error>
                </div>
                <div class="col-span-2">
                    <x-label>Password</x-label>
                    <x-input class="block mt-1 w-full" type="password" name="password" id="password" autofocus />
                    <x-span-error name='password'></x-span-error>
                </div>
                <div class="col-span-2">
                    <x-label>Confirm Password</x-label>
                    <x-input class="block mt-1 w-full" type="password" name="password_confirmation"
                        id="password_confirmation" autofocus />
                </div>
                <div class="col-span-2"></div>
                <div class="col-span-2">
                    <p>Date of birth</p>
                    <input class="border-slate-300 rounded-lg w-80 " type="text" name="dob" id="dob" :value="$user->dob">
                    <x-span-error name='dob'></x-span-error>
                </div>
            </div>
            <button id="btnUpdateUser" class="bg-blue-400 text-white font-bold w-80 text-center py-2 mt-5 rounded-lg"
                type="submit">Save</button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var dob = `{{ $user->dob }}`.toString();
            $('#dob').val(dob);
        });
        flatpickr("#dob", {
            enableTime: false,
            dateFomat: "Y-m-d",
        });
    </script>
@endsection
