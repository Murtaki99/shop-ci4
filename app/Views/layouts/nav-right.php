<ul class="navbar-nav">
    <li class="nav-item mx-md-4">
        <a href="<?= base_url('/carts') ?>" class="nav-link position-relative d-inline-block">
            <i class="fas fa-shopping-cart"></i>
            <?php if (auth()): ?>
                <?php if ($cartCount > 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                        <?= $cartCount ?>
                    </span>
                <?php endif; ?>
            <?php endif; ?>
        </a>
    </li>

    <?php if (guest()): ?>
        <li class="nav-item">
            <a href="<?= base_url('/login') ?>" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/register') ?>" class="nav-link">Register</a>
        </li>
    <?php else: ?>
        <?php $user = auth(); ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <?= esc($user['name']) ?>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('/profile') ?>">Profile</a></li>
                <li>
                    <?= form_open(base_url('/logout'), ['method' => 'POST']) ?>
                    <?= csrf_field() ?>
                    <button type="submit" class="dropdown-item">Logout</button>
                    <?= form_close() ?>
                </li>
            </ul>
        </li>
    <?php endif; ?>
</ul>