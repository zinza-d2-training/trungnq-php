@extends('layouts.client')
@section('title')
    Company management
@endsection
@section('content')
    <x-breadcrumbs name='createcompany'></x-breadcrumbs>
    <div class="px-6">
        <div class=" my-4 py-2  flex flex-row justify-between">
            <div class="">Create company </div>
            <div class="">
                <a href="{{ route('company.create') }}" class="p-2 bg-blue-600 rounded-lg text-white">Back</a></div>
        </div>
         @if (Session::has('message'))
             @php
             $message = Session::get('message');
             @endphp
             <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
         @endif
        <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <x-label>Name</x-label>
                            <x-input class="block mt-1 w-full " type="text" name="name" id='name'  :value="old('name')" re />
                            <x-span-error name='name'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Avatar</x-label>
                            <x-input class="block mt-1 w-full py-2 " type="file" name="avatar" id='avatar' :value="old('avatar')"/>
                            <x-span-error name='avatar'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Address</x-label>
                            <x-input class="block mt-1 w-full py-2 " type="text" name="address" id='address' :value="old('address')"  />
                            <x-span-error name='address'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Max-users</x-label>
                            <x-input class="block mt-1 w-full py-2 " type="text" name="max_users" id='max_users' :value="old('max_users')" />
                            <x-span-error name='max_users'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Expired at</x-label>
                            <x-input class="block mt-1 w-full py-2 " type="text" name="expired_at" id='expired_at' :value="old('expired_at')" />
                            <x-span-error name='expired_at'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Active</x-label>
                            <select name="active" id="adtive" class="w-full py-2 border-slate-300 mt-1 border-2 rounded-lg">
                                <option value="0">InActive</option>
                                <option value="1">Active</option>
                            </select>
                            <x-span-error name='active'></x-span-error>
                        </div>
                        <div class="col-span-1 mb-4 bg-blue-200">
                            <button class="py-2 text-black w-full font-bold text-center" id="btnCreateCompany"type ="submit" >Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {});
        flatpickr("#expired_at", {
            enableTime: false,
            dateFomat: "Y-m-d",
        });
    </script>
@endsection