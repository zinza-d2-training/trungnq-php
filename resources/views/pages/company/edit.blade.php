@extends('layouts.client')
@section('title')
    Company management
@endsection
@section('content')
    <x-breadcrumbs name='editcompany' :param="$company->id"></x-breadcrumbs>
    <div class="px-6">
        <div class=" my-4 py-2  flex flex-row justify-between">
            <div class="">Create company </div>
            <div class="">
                <a href="{{ route('company.create') }}" target="bank"
                    class="p-2 bg-blue-600 rounded-lg text-white">Back</a>
            </div>
        </div>
        @if (Session::has('message'))
            @php
                $message = Session::get('message');
            @endphp
            <x-toast :content="$message['content']" :type="$message['type']"></x-toast>
        @endif
        <div id="toast"></div>
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <form action="" method="POST" enctype="multipart/form-data" id="formUpdateCompany">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <x-label>Name</x-label>
                            <x-input class="block mt-1 w-full " type="text" name="name" id='name' :value="$company->name" />
                            <input type="hidden" name="" id="id_company" value="{{$company->id}}">
                            <x-span-error name='name'></x-span-error>
                        </div>
                        <div class="col-span-1 ">
                            <x-label>Avatar</x-label>
                            <div class="flex gap-4">
                                <div class="">
                                    <img src="/storage/images/company/{{ $company->avatar }}"
                                    class="w-10 h-10 mr-3 rounded-full" alt="">
                                </div>
                                <div class="relative">
                                    <div class=""><img src="/images/camera.png" alt="" class="w-8"></div>
                                    <input class="absolute  top-0 w-10 opacity-0 " type="file" name="avatar" id='avatar' />
                                </div>
                            </div>
                            <x-span-error name='avatar'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Address</x-label>
                            <x-input class="block mt-1 w-full py-2 " type="text" name="address" id='address'
                                :value="$company->address" />
                            <x-span-error name='address'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Max-users</x-label>
                            <x-input class="block mt-1 w-full py-2 " type="text" name="max_users" id='max_users'
                                :value="$company->max_users" />
                            <x-span-error name='max_users'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Expired at</x-label>
                            <x-input class="block mt-1 w-full py-2 " type="text" name="expired_at" id='expired_at'
                                :value="$company->expired_at" />
                            <x-span-error name='expired_at'></x-span-error>
                        </div>
                        <div class="col-span-1">
                            <x-label>Active</x-label>
                            <select name="active" id="active" class="w-full py-2 border-slate-300 mt-1 border-2 rounded-lg">
                                <option value="0" {{ $company->active == 0 ? 'selected' : '' }}>InActive</option>
                                <option value="1" {{ $company->active == 1 ? 'selected' : '' }}>Active</option>
                            </select>
                            <x-span-error name='active'></x-span-error>
                        </div>
                        <div class="col-span-1 mb-4 bg-blue-200">
                            <button class="py-2 text-black w-full bg-blue-300 font-bold text-center rounded-lg hover:bg-blue-500" id="btnUpdateCompany"
                                type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
