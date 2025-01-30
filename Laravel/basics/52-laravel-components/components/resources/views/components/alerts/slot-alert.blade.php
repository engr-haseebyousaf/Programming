<div class="alert alert-{{$type}}" role="alert">
        @if(isset($title))
            <h4 {{$title->attributes->class(["alert-heading"])}}>{{$title}}</h4>
            <hr>
        @endif
    @if($slot->isEmpty())
        <p>This is the default text: insert slot to interchange it with this default text</p>
    @else
        {{$slot}}
    @endif
</div>