<?php
/**
 * Halaman keranjang belanja user.
 * Menampilkan daftar produk yang sudah dipilih, jumlah, harga, dan total pembayaran.
 */
?>
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <h3 class="mb-0 font-weight-bold text-dark">Keranjang Belanja</h3>
                <span class="badge badge-primary badge-pill px-3 py-2">
                    <?php echo $this->cart->total_items(); ?> item
                </span>
            </div>

            <?php if ($this->cart->total_items() > 0) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" style="border-radius: 12px; overflow: hidden;">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" style="width: 70px;">No</th>
                                <th>Nama Produk</th>
                                <th class="text-center" style="width: 190px;">Jumlah</th>
                                <th class="text-right" style="width: 170px;">Harga</th>
                                <th class="text-right" style="width: 170px;">Sub-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($this->cart->contents() as $items) :
                            ?>
                                <tr>
                                    <td class="text-center align-middle font-weight-bold"><?php echo $no++; ?></td>
                                    <td class="align-middle"><?php echo $items['name']; ?></td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="<?php echo base_url('dasboard/update_keranjang/' . $items['rowid'] . '/' . ($items['qty'] - 1)); ?>" class="btn btn-sm btn-light border" style="width: 34px; height: 34px; font-size: 20px; line-height: 1; padding: 0;">-</a>
                                            <span class="mx-3 font-weight-bold" style="min-width: 30px; text-align: center; font-size: 18px;">
                                                <?php echo $items['qty']; ?>
                                            </span>
                                            <a href="<?php echo base_url('dasboard/update_keranjang/' . $items['rowid'] . '/' . ($items['qty'] + 1)); ?>" class="btn btn-sm btn-light border" style="width: 34px; height: 34px; font-size: 20px; line-height: 1; padding: 0;">+</a>
                                        </div>
                                    </td>
                                    <td class="text-right align-middle">Rp. <?php echo number_format($items['price'], 0, ',', '.'); ?></td>
                                    <td class="text-right align-middle font-weight-bold">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-light">
                                <td colspan="4" class="text-right font-weight-bold">Total Belanja</td>
                                <td class="text-right font-weight-bold text-primary" style="font-size: 1.05rem;">
                                    Rp. <?php echo number_format($this->cart->total(), 0, ',', '.'); ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4 flex-wrap">
                    <a href="<?php echo base_url('dasboard/hapus_keranjang'); ?>" class="btn btn-danger btn-lg mr-3 mb-2">
                        <i class="fas fa-trash mr-2"></i>Hapus Keranjang
                    </a>
                    <a href="<?php echo base_url('dasboard/index'); ?>" class="btn btn-primary btn-lg mr-3 mb-2">
                        <i class="fas fa-shopping-cart mr-2"></i>Lanjutkan Belanja
                    </a>
                    <a href="<?php echo base_url('dasboard/pembayaran'); ?>" class="btn btn-success btn-lg mb-2">
                        <i class="fas fa-credit-card mr-2"></i>Pembayaran
                    </a>
                </div>
            <?php else : ?>
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-4x text-gray-300 mb-3"></i>
                    <h5 class="text-gray-600">Keranjang Anda masih kosong</h5>
                    <p class="text-gray-500">Silakan pilih produk terlebih dahulu.</p>
                    <a href="<?php echo base_url('dasboard/index'); ?>" class="btn btn-primary mt-2">Belanja Sekarang</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

