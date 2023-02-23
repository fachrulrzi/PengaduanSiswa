<nav class="navbar navbar-expand-lg bg-light rounded-4 p-lg-3 p-sm-0 p-md-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-3" href="/admin">Pengaduan Sekolah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Log Out</button>
            </form>
        </div>
    </div>
</nav>
