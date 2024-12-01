 <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
     <!-- <li class="nav-item active">
         <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
     </li> -->
     <?php if (can('admin')): ?>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                 Manage
             </a>
             <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="<?= base_url('/categories') ?>">Kategori</a></li>
                 <li><a class="dropdown-item" href="<?= base_url('/products') ?>">Produk</a></li>
                 <li><a class="dropdown-item" href="<?= base_url('/users') ?>">Pengguna</a></li>
                 <li><a class="dropdown-item" href="#">Order</a></li>
             </ul>
         </li>
     <?php endif; ?>
 </ul>