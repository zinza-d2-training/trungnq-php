
@if ($errors->any($name))
    <span class=" ml-2">{{$errors->first($name)}}</span>
@endif