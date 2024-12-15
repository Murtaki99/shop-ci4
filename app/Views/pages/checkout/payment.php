<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Checkout Berhasil</h3>
            </div>
            <div class="card-body">
                <h4>Nomor Order: <strong><?= esc($order['invoice']) ?></strong></h4>
                <p>Terima kasih sudah berbelanja di tempat kami!</p>
                <p>Silahkan lakukan pembayaran agar pesanan Anda dapat kami proses lebih lanjut.</p>

                <h4>Metode Pembayaran</h4>
                <ol>
                    <li>
                        <strong>BCA: 090889878676</strong> a/n MURTAKI
                    </li>
                    <li>
                        <strong>BRI: 090889878676</strong> a/n MURTAKI
                    </li>
                </ol>

                <p>
                    Sertakan Nomor Order: <strong><?= esc($order['invoice']) ?></strong> pada keterangan pembayaran.
                </p>
                <p>
                    Total Pembayaran: <strong>Rp <?= number_format($order['total'], 0, ',', '.') ?></strong>
                </p>

                <p>
                    Setelah melakukan pembayaran, silahkan unggah bukti transaksi
                    <a href="<?= base_url('/upload-proof') ?>">di halaman ini</a>.
                </p>
                <a href="<?= base_url('/') ?>" class="btn btn-secondary">
                    <i class="fas fa-angle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>