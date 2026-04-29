<html>
    <head>
        <title>@yield("title", "My laravel App")</title>
    </head>
    <body>
        <header?>
            <nav>
                <a href="/home">Home</a>
                <a href="/about">About</a>
                <a href="/contact">Contact</a>
            </nav>
        </header>
            <div class="container">
                @yield("content")
            </div>
            <footer>
                <p>&copy; 2026 Laravel Website XYZ</p>
            </footer>
    </body>
</html>