<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resset Password</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <section class="h-screen bg-neutral-100 mx-auto" style="max-width: 1440px">
        <div class="flex justify-center align-middle h-screen">
            <div class="container w-4/12 flex flex-col mx-auto bg-white my-auto rounded-lg " style="height: 768px;">
                <div class="flex item-center  items-center w-full  px-6 " style="height: 72px; border-bottom: 2px solid #f5f5f5" >
                    <div class="text-base font-bold ">
                        Create new password
                    </div>
                    
                </div>
                <div class="logo mx-auto mt-3">
                    <img src="images/image6.svg" alt="">
                </div>
                @if (Session::has('error'))
                        <div class="mt-4 mx-auto text-red-500 text-lg ">{{Session::get('error')}}</div>
                @endif
                <div class="flex flex-col mt-8 w-full">
                    @if (Session::get('message'))
                        <div class="px-10 py-4">
                            <h5 class="text-bold">{{Session::get('message')}} </h5>
                        </div>
                    @endif
                    <form action="{{ route("custom.reset.password.post") }}" class="px-6" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="col-span-2">
                            <x-label>Email</x-label>
                            <x-input class="block mt-1 w-full bg-slate-300" type="email" name="email"   autofocus/>
                            <x-span-error name='email'></x-span-error>
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
                        <div class=" mb-10 mt-4">
                            <button class="w-full bg-blue-400 py-3 rounded-lg text-white mt-8" type="submit">Change password</button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <a href="{{ route('custom-login') }}" class="decoration-slate-400">Login here</a>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>
