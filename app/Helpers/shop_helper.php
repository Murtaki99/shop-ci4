<?php

use App\Models\User;
use Config\Services;

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
                <button type="submit" class="btn bg-green text-white btn-sm" id="addon-wrapping">
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
        string  $idProduct = '',
        string  $name = '',
        int     $price = 0,
        string  $img = null,
        string  $category = '',
        int     $count = 0,
        string  $urlCategory = '#',
        string  $urlShow = '#'

    ): string {
        // Base URL for product images
        $imgUrl = !empty($img)
            ? base_url('storage/products/' . $img)
            : 'https://placehold.co/565x600';

        // Card HTML structure
        return '
            <div class="card">
                <a href="' . $urlShow . '">
                    <img src="' . esc($imgUrl) . '" alt="' . esc($name) . '" class="card-img-top" style="width: 100%; height:25vh;" />
                </a>
                <div class="card-body">
                    <h3 class="card-title mb-0">' . esc($name) . '</h3>
                    <p class="card-text mb-0">' . esc(rp($price)) . '</p>
                    <a href="' . $urlCategory . '" class="badge badge-primary badge-pill"><i class="fas fa-tag"></i> ' . esc($category) . '</a>
                    <span class="badge badge-success badge-pill"> Tersisa ' . esc($count) . ' Item</span>
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
                                    <span href="" class="badge badge-primary"><i class="fas fa-tag"></i> ' . esc($category) . '</span>
                                    <span class="badge badge-success badge-pill">Tersisa ' . esc($count) . ' Item</span>
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
    /**
     * Generate HTML for adding product to cart
     *
     * @param int $id Product ID
     * @param int $quantity Default quantity
     * @return string HTML for the add-to-cart form
     */
    function add_cart(
        int $id = null,
    ): string {
        $action = base_url('/carts/add');
        $id = esc($id);
        return  form_open($action, ['method' => 'POST']) . '
        ' . csrf_field() . '
        <div class="input-group flex-nowrap">
            <input type="hidden" value="' . $id . '" name="idproduct" id="idproduct">
            <input type="number" class="form-control" name="quantity" id="quantity" value="0">
            <div class="input-group-prepend">
                <button type="submit" class="btn btn-primary" id="addon-wrapping">
                    <i class="fas fa-cart-plus"></i>
                </button>
             </div>
        </div>' . form_close();
    }
}

if (!function_exists('can')) {
    function can($role)
    {
        $session = Services::session();
        $userId = $session->get('user_id');
        if (!$userId) {
            return false;
        }

        // Memuat model User
        $userModel = new User();
        $user = $userModel->find($userId);
        if ($user && $user['role'] === $role) {
            return true;
        }
        return false;
    }
}

if (!function_exists('guest')) {
    function guest()
    {
        $session = Services::session();
        return !$session->get('user_id');
    }
}

if (!function_exists('auth')) {
    function auth()
    {
        $session = Services::session();
        $userId = $session->get('user_id');
        if (!$userId) {
            return false;
        }

        $userModel = new User();
        return $userModel->find($userId) ?: false;
    }
}

if (!function_exists('dateID')) {
    /**
     * Format tanggal ke format Indonesia
     *
     * @param string $date Tanggal dalam format Y-m-d atau Y-m-d H:i:s
     * @param bool $includeTime Apakah waktu harus disertakan (opsional)
     * @return string Tanggal dalam format Indonesia
     */
    function dateID($date, $includeTime = false)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $timestamp = strtotime($date);
        $day = date('d', $timestamp);
        $month = (int)date('m', $timestamp);
        $year = date('Y', $timestamp);

        $formattedDate = $day . ' ' . $bulan[$month] . ' ' . $year;

        if ($includeTime) {
            $time = date('H:i:s', $timestamp);
            $formattedDate .= ' ' . $time;
        }

        return $formattedDate;
    }
}
