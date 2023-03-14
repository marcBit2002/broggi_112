<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Broggi 112</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0"></ul>
            <div class="d-flex align-items-center text-primary">
                <p class="m-1 me-3">username</p>
                <a href="{{ url('/logout') }}">
                    <h3 class="m-1"><i class="bi bi-box-arrow-right"></i></h3>
                </a>
            </div>
        </div>
    </div>
</nav>
