<div class="div">
    <section class="mx-auto flex flex-row items-center justify-between" style="height: 50px; max-width: 1440px; background-image: linear-gradient(to right, #D51E36, #273494);" >
        <div class="flex flex-row place-content-between items-center">
            <div class="ml-5">
                <ul class="flex">
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black" href="#">Dashboard</a>
                    </li>
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black" href="#">User</a>
                    </li>
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black" href="#">Cpmpany</a>
                    </li>
                    <li class="mr-6">
                      <a class="text-white font-bold hover:text-black " href="#">Topic</a>
                    </li>
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black " href="#">Tag</a>
                    </li>
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black  " href="#">Post</a>
                    </li>
                  </ul>
            </div>
        </div>
        <div class="flex flex-row mr-6">
            <div class="">
                <a href="{{route("custom-logout")}}" class=" mx-3 text-white">Logout</a>
                <a href="{{route("account")}}" class="mx-3 text-white">Setting</a>
            </div>
            <input type="text" class="rounded-md" style="width: 252px; height:40px" placeholder="Search...">
            <button class="ml-6 " >
                <img src="/images/image6.svg"  alt="" width="27px">
            </button>
        </div>
      </section>
      <div class="pl-6 py-2 bg-slate-100" >
        <p><a href="{{route('home')}}">Dashboard</a><a href="{{route('account')}}">/users</a>/setting</p>
      </div>
</div>