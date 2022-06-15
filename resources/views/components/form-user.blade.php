
<div class="grid grid-cols-8 gap-4 mt-8">
    <div class="col-span-2">
        <x-label>Email</x-label>
        <x-input class="block mt-1 w-full bg-slate-300" type="email" name="email"  :value="$user->email" required autofocus
            readonly />
            <input type="hidden" name="id" id="id" value="{{$user->id}}"> 
        <x-span-error name='email' ></x-span-error>
    </div>
    <div class="col-span-2 ">
        <x-label>Username</x-label>
        <x-input class="block mt-1 w-full" type="text" name="name" id="name" :value="$user->name" required
            autofocus />
        <x-span-error name='name'></x-span-error>
    </div>
    <div class="col-span-4 "></div>
    <div class="col-span-2">
        <x-label>Role</x-label>
        <select name="role_id" id="role" class="w-full rounded-lg border-slate-200">
            <option value="0"  >Pick an Role</option>
            <option value="1" {{$user->role->id == 1 ? "selected" :""}}>Admin</option>
            <option value="2" {{$user->role->id == 2 ? "selected" :""}}> Company Account</option>
            <option value="3" {{$user->role->id == 3 ? "selected" :""}}>Member</option>
        </select>
        <x-span-error name='old_password'></x-span-error>
    </div>
    <div class="col-span-2">
        <x-label>Company</x-label>
        <select name="company" id="company" class="w-full rounded-lg border-slate-200">
            <option value="0" selected>Choose an company</option>
            @if (count($companyList))
                @foreach ($companyList as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            @endif
        </select>
        <x-span-error name="company"></x-span-error>
    </div>
    <div class="col-span-4">
    </div>
    <div class="col-span-2">
        <x-label>Date of birth</x-label>
        <input class="border-slate-300 rounded-lg w-full " type="text" name="dob" id="dob" :value="$user->dob">
        <x-span-error name='dob'></x-span-error>
    </div>
    <div class="col-span-2">
        <x-label>Active</x-label>
        <select name="ative" id="active" class="w-full rounded-lg border-slate-200">
            <option value="1" {{($user->active == 1)?"selected" :""}}> Active</option>
            <option value="0"{{($user->active == 0)?"selected" :""}}> InActive</option>
        </select>
        <x-span-error name='old_password'></x-span-error>
    </div>
    <div class="col-span-4"></div>
    <div class="col-span-2">
        {{$slot}}
    </div>
</div>