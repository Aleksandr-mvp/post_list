<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Laravel Base</title>
</head>
<body>
<div class="container mt-3">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">
                            Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}">
                            Contacts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}">
                            About
                        </a>
                    </li>
                    @can('view', auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.post.index') }}">
                            Admin Panel
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
