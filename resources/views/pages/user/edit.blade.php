@extends('layouts.client')
@section('title')
    User management
@endsection
@section('content')
    <x-breadcrumbs name='edituser' :param="$user->id"></x-breadcrumbs>
    <div id="toast"></div>
    <div class="px-6">
        <div class=" my-4 py-2 ">
            Update user
        </div>
        <div class="">
            <form action="{{ route('user.update', ['id' => $user]) }}" id="form-update-user" method="POST">
                @csrf
                <x-form-user :user="$user" :companyList="$companyList">
                    <button id="btnUserUpdate"
                        class="bg-blue-400 text-white font-bold w-full text-center py-2 mt-5 rounded-lg"
                        type="submit">Update</button>
                </x-form-user>
            </form>
        </div>
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
