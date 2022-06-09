<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resetpassword</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <section class="h-screen bg-neutral-100 mx-auto" style="max-width: 1440px">
        <div class="flex justify-center align-middle h-screen">
            <div class="container w-4/12 flex flex-col mx-auto bg-white my-auto rounded-lg " style="height: 768px;">
                <div class="flex item-center  items-center w-full  px-6 " style="height: 72px; border-bottom: 2px solid #f5f5f5" >
                    <div class="text-base font-bold ">
                        Forgot password
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
                    <form action="{{ route("make-password") }}" class="px-6" method="POST">
                        @csrf
                        <label for="email">Email:</label>
                        <input type="text" class="w-full border-neutral-300 rounded-lg " placeholder="Email" name="email">
                        @error('email')
                            <span class="text-red-600"> {{$message}}</span>
                        @enderror
                        <div class=" mb-10 mt-4">
                            <button class="w-full bg-blue-400 py-3 rounded-lg text-white mt-8" type="submit">Send new password</button>
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
