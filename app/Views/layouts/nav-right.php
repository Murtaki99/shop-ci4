<ul class="navbar-nav">
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="fas fa-shopping-cart"> Cart(0)</i>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('/login') ?>" class="nav-link">
            Login
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('/register') ?>" class="nav-link">
            Register
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Admin
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
    </li>
</ul>