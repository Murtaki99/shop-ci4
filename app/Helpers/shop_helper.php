<?php
if (!function_exists('no')) {
    function no($pager, $index)
    {
        $currentPage = $pager->getCurrentPage(); // Nomor halaman saat ini
        $perPage = $pager->getPerPage(); // Jumlah item per halaman
        $offset = ($currentPage - 1) * $perPage; // Hitung offset

        return $offset + $index + 1;
    }
}

if (!function_exists('search')) {
    function search($url)
    {
        return '
        <form class="input-group flex-nowrap" method="GET" action="' . esc(base_url($url)) . '">
            <input type="search" class="form-control form-control-sm" name="search" id="search" placeholder="Cari..." value="' . (isset($_GET['search']) ? esc($_GET['search']) : '') . '">
            <div class="input-group-prepend">
                <button type="submit" class="btn btn-primary btn-sm" id="addon-wrapping">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        ';
    }
}

if (!function_exists('rp')) {
    /**
     * Format angka menjadi format Rupiah
     *
     * @param int|float $amount Jumlah angka yang akan diformat
     * @return string Format Rupiah (contoh: Rp 1.000.000)
     */
    function rp($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}

if (!function_exists('str_limit')) {
    function str_limit(string $value, int $limit = 100, string $end = '...'): string
    {
        return mb_strlen($value) > $limit ? mb_substr($value, 0, $limit) . $end : $value;
    }
}

if (!function_exists('card')) {
    function card(
        string $idProduct = '',
        string $name = '',
        int $price = 0,
        string $img = null,
        string $category = '',
        int $count = 0,
        string $description = ''
    ): string {
        // Base URL for product images
        $imgUrl = !empty($img)
            ? base_url('storage/products/' . $img)
            : 'https://placehold.co/420x400';

        // Card HTML structure
        return '
            <div class="card">
                <a href="#" data-toggle="modal" data-target="#show-' . $idProduct . '">
                    <img src="' . esc($imgUrl) . '" alt="' . esc($name) . '" class="card-img-top" style="width: 100%; height:25vh;" />
                </a>
                <div class="card-body">
                    <h4 class="card-title">' . esc($name) . '</h4>
                    <p class="card-text mb-0">' . esc(rp($price)) . '</p>
                    <p class="card-text mb-0">' . esc(str_limit($description, 25, '...')) . '</p>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-tag"></i> ' . esc($category) . '</span>
                    <span class="badge badge-success badge-pill"> Tersisa ' . esc($count) . ' Items</span>
                </div>
            </div>
        ';
    }
}

if (!function_exists('modal_show')) {
    function modal_show(
        string $idProduct = '',
        string $name = '',
        int $price = 0,
        string $img = null,
        string $category = '',
        int $count = 0,
        string $description = ''
    ): string {
        $imgUrl = !empty($img)
            ? base_url('storage/products/' . $img)
            : 'https://placehold.co/420x400';
        return '
            <div class="modal fade" id="show-' . $idProduct . '" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                            <img src="' . esc($imgUrl) . '" alt="' . esc($name) . '" class="card-img-top" />
                    </div>
                    <div class="col-md-6">
                        <h2 class="card-tite">' . esc($name) . '</h2>
                        <p class="card-text mb-0">' . esc(rp($price)) . '</p>
                        <p class="card-text mb-0">' . esc(str_limit($description, 25, '...')) . '</p>
                        <span href="" class="badge badge-primary"><i class="fas fa-tag"></i> ' . esc($category) . '</span> |
                        <span>Tersisa <span class="badge badge-success badge-pill">' . esc($count) . '</span></span>
                        <form class=" my-4 input-group flex-nowrap">
                            <input type="search" class="form-control" name="search" id="search">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-primary" id="addon-wrapping">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        ';
    };
}

if (!function_exists('add_cart')) {
}
