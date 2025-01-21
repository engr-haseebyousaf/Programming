<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('style')
    <title>Haseeb Yousaf - @yield('title', 'Website')</title>
</head>
<body>
    <div id="main">
        <!-- Header -->
        <div id="header">
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="contact">Contact</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </nav>
        </div>
        <!-- Main Content -->
        <section id="content">
            @hasSection("content")
                @yield("content")
            @else
                <h2>No Content found</h2>
            @endif
            
        </section>
        <!-- Sidebar -->
        <section id="side-bar">
            @section('sidebar')
                    <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="#">Gallery</a></li>
            </ul>
            @show
        </section>
        <!-- Footer -->
        <section id="footer">This is sample website</section>
    </div>
    @stack('scripts')
</body>
</html>