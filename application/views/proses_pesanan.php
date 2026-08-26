<?php
/**
 * Halaman konfirmasi pesanan setelah checkout berhasil.
 * Menampilkan ringkasan pesanan yang sudah dibeli dan tombol aksi lanjutan.
 */
?>
<div class="container-fluid">
    <?php if (!empty($pesanan)) : ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 font-weight-bold text-dark">Pesanan yang sudah dibeli</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($pesanan as $item) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['qty']; ?></td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                                    <td>Rp. <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-light">
                                <td colspan="4" class="text-right font-weight-bold">Total</td>
                                <td class="font-weight-bold text-primary">Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 mb-4" style="background: #d9f5eb; border-left: 6px solid #1cc88a;">
        <div class="card-body py-5 px-4">
            <div class="text-center">
                <div class="mb-3">
                    <i class="fas fa-check-circle fa-4x text-success"></i>
                </div>
                <h3 class="font-weight-bold text-dark mb-3">Pesanan Berhasil</h3>
                <p class="mb-0 text-dark" style="font-size: 1.15rem; line-height: 1.8;">
                    Selamat, Pesanan Anda telah berhasil diproses!!<br>
                    Terima kasih telah berbelanja di toko online kami. :)
                </p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-start flex-wrap">
        <a href="<?php echo base_url('dasboard'); ?>" class="btn btn-primary btn-lg px-4 mr-3 mb-2">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        <button type="button" class="btn btn-secondary btn-lg px-4 mb-2" onclick="window.print()">
            <i class="fas fa-print mr-2"></i>Cetak
        </button>
    </div>
</div>
