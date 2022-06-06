
@if ($errors->any($name))
    <span class="text-red-400 ml-2">{{$errors->first($name)}}</span>
@endif