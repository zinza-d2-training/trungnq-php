
@if ($errors->any($name))
    <span class=" ml-2 text-red-500">{{$errors->first($name)}}</span>
@endif