{{-- <div class="alert alert-{{$typeCheck}}" role="alert">
    {{$message}}
</div> --}}

{{-- To Pass some extra attributes like saperate class and id --}}

{{-- <div {{$attributes->merge(["class"=>"alert alert-".$typeCheck, "role"=>"alert"])}}>
    {{$message}}
</div>  --}}

{{-- To prepend the newely passed role attribute with the previous default one --}}

{{-- <div {{$attributes->merge(["class"=>"alert alert-".$typeCheck, "role"=>$attributes->prepends("alert")])}}>
    {{$message}}
</div>  --}}

{{-- To add dismissable alert i.e it should have some extra classes than simple alert which should be shown on the basis of a specific condition. If that condition attribute is passed to alert tag it should show that particular code --}}

<div {{$attributes->class(["alert-dismissible fade show"=>$dismissable])->merge(["class"=>"alert alert-".$typeCheck, "role"=>$attributes->prepends("alert")])}}>
    {{$message}}
    @if($dismissable)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>     
    @endif
</div>