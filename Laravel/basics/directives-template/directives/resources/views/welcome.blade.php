@extends("template")
@section("content")
<h1>Home Page</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit incidunt blanditiis porro ad doloribus placeat veniam praesentium in sed eum, deserunt unde maxime eligendi accusamus vitae animi non delectus ut.</p>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis magnam dignissimos ea voluptatem nam exercitationem facilis harum nihil, numquam molestiae ducimus enim quasi blanditiis quo. Nisi cum excepturi dolore soluta!</p>
@endsection
@section('title')
    Home
@endsection

@push('scripts')
    <script src="example.js"></script>
    <script src="bootstrap.js"></script>
    <script src="vue.js"></script>
@endpush
@push('scripts')
    <script src="one.js"></script>
@endpush

@prepend('style')
    <style>
        #content{
            background-color: tan
        }
    </style>
@endprepend