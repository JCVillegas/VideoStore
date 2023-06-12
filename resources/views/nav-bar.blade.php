<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ env('APP_URL') . '/' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ env('APP_URL') . '/movieCards' }}">Movie Cards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ env('APP_URL') . '/addMovie' }}">Add Movie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
