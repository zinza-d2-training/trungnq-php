<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>
    <section class="h-screen bg-neutral-100 mx-auto" style="max-width: 1440px">
        <div class="flex justify-center align-middle h-screen">
            <div class="container w-4/12 flex flex-col mx-auto bg-white my-auto rounded-lg " style="height: 768px;">
                <div class="flex item-center  items-center w-full  px-6 " style="height: 72px; border-bottom: 2px solid #f5f5f5" >
                    <div class="text-base font-bold ">
                        Login
                    </div>
                </div>
                <div class="logo mx-auto mt-3">
                    <img src="images/image6.svg" alt="">
                </div>
                @if (Session::has('error'))
                    <div class="text-red-500">{{Session::get('error')}}</div>
                @endif
                <div class="flex flex-col mt-8 w-full">
                    <form action="{{ route("custom-login") }}" class="px-6" method="POST">
                        @csrf
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input id="password" class="block mt-5 w-full" type="password" name="password" :value="old('password')" required autofocus />

                        <div class="mr-6 mt-4 text-right">
                            <a href="{{ route('custom-reset-password') }}">Forgot password?</a>
                        </div>
                        <x-button>Login</x-button>
                    </form>
                </div>
                <hr>
                <div class="mb-6" style="margin-top: -13px; margin-left: 42%">
                    <span class="px-5 bg-white"  >Or</span>
                </div>
              
                <div class=" flex flex-row  gap-4  mb-4 mx-6 py-2 " style="border: 2px solid #ddd; border-radius: inherit">
                    <div class="basis-1/4 ">
                        <img src="images/image2.png" class="ml-auto" width="23px" height="23px" alt="">
                    </div>
                    <div class="basis-2/4 text-center text-base"><a href="">Login with google</a></div>
                    <div class="basis-1/4"></div>
                </div>
                <div class=" flex flex-row  gap-4  mb-4 mx-6 py-2"  style="border: 2px solid #ddd; border-radius: inherit">
                    <div class="basis-1/4 ">
                        <img src="images/image3.png" class="ml-auto" width="23px" height="23px" alt="">
                    </div>
                    <div class="basis-2/4 text-center text-base"><a href="">Login with facebook</a></div>
                    <div class="basis-1/4"></div>
                </div>
            
                <div class=" flex flex-row gap-4  mb-4 mx-6 py-2 "  style="border: 2px solid #ddd; border-radius: inherit">
                    <div class="basis-1/4 ">
                        <img src="images/image4.png" class="ml-auto"width="23px" height="23px" alt="">
                    </div>
                    <div class="basis-2/4 text-center text-base"><a href="">Login with apple</a></div>
                    <div class="basis-1/4"></div>
                </div>
                
            </div>
        </div>
    </section>
    <script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>
