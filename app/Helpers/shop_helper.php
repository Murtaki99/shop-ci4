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
