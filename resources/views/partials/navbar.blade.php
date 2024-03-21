<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top  bg-dark" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="/img/out.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="/info">Info</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        <li  class="nav-item">
                            <?php
                            if(Session::get('logged_in')) {?>
                                 <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-in-right"></i>Logout</a>
                            <?php } else {?>
                                <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                            <?php } ?>
                       </li>
                    </ul>

    
                </div>
            </div>
        </nav>
       