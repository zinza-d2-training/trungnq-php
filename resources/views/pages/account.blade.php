@extends('layouts.client');

@section('content')
    <div class="mx-6">
        <h1 class="text-lg font-bold">{{$user->name}}</h1>
        <img src="{{"images/".$user->avatar}}" class="rounded-full" width="92px" alt="">
        <form action="{{route('account-update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" style="background-image: /images/image8.">
            <div class="grid grid-cols-8 gap-1 mt-8">
                <div class="col-span-2">
                    <p >Name</p>
                    <input name="name"  class="border-slate-300 rounded-lg w-80 " type="text" value="{{$user->name}}" >
                </div>
                <div class="col-span-2">
                    <p>Email</p>
                    <input  class=" border-slate-300 rounded-lg w-80 bg-slate-200 " type="text" value="{{$user->email}}" readonly>
                </div>
                <div class="col-span-4"></div>
                <div class="col-span-2">
                    <p > Old password</p>
                    <input  class="border-slate-300 rounded-lg w-80 " type="text" name="password">
                </div>
                <div class="col-span-2">
                    <p  >Password</p>
                    <input class="border-slate-300 rounded-lg w-80 " type="text" name="new_password">
                </div>
                <div class="col-span-2">
                    <p >Confirm Password</p>
                    <input class="border-slate-300 rounded-lg w-80 " type="text" name="new_password_rp">
                </div>
                <div class="col-span-2"></div>
                <div class="col-span-2">
                    <p >Date of birth</p>
                    <input class="border-slate-300 rounded-lg w-80 " type="Date" class="flatpickr" name="password">
                </div>
            </div>
            <button class="bg-blue-400 text-white font-bold w-80 text-center py-2 mt-5 rounded-lg" type="submit">Save</button>
        </form>
    </div> 
    
@endsection