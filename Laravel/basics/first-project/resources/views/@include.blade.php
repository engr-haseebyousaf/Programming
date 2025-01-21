@php
    $fruits = ["one" => "Orange", "two" => "Mango", "three" => "Banana", "four" => "Apple"];
@endphp
@include("@include.header",["fruits",$fruits])
<h1>This is the main content of main file</h1>
@include("@include.footer")
@includeIf("@include.content")

@includeWhen(true,"@include.@includeWhen()" )
@includeUnless(false, "@include.@includeUnless()")