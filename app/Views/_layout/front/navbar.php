<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Rental Mobil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            </ul>

            <?php if (session()->get('user_logged_in')) { ?>
            <div class="d-flex mx-2 my-2">
                <a class="btn btn-outline-dark position-relative" href="/rent/menu_transaksi">
                    <i class="bi-cart-fill me-1"></i>
                    Transaksi <span class="ms-1 badge text-bg-success"><?= $tx ?></span>
                </a>
            </div>
            <div class="d-flex mx-1">
                <a href="/user/logout" class="btn btn-danger" type="submit">
                    <i class="bi bi-box-arrow-in-left me-1"></i>
                    Logout
                </a>
            </div>
            <?php } ?>
            <?php if (!session()->get('user_logged_in')) { ?>
            <div class="d-flex mx-1">
                <a href="/user/login" class="btn btn-primary" type="submit">
                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Login
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>