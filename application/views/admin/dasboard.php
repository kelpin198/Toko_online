<?php
/**
 * Dashboard admin untuk melihat ringkasan toko.
 * Menampilkan statistik produk, invoice, pendapatan, dan pesanan terbaru.
 */
?>
<div class="container-fluid">
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-secondary btn-lg" onclick="window.print()">
            <i class="fas fa-print mr-2"></i>Cetak
        </button>
    </div>
    
    <!-- Content Row -->
    <div class="row">

        <!-- Blok 1: Statistik total produk yang saat ini tersedia di database -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_produk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blok 2: Statistik total invoice / transaksi yang sudah masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Invoice</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_invoice; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blok 3: Statistik jumlah item yang sudah terjual / jumlah record di tb_pesanan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Item Terjual</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pesanan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blok 4: Statistik total pendapatan dari seluruh transaksi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($total_revenue, 0, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <!-- Tabel pesanan terbaru: menampilkan data invoice yang terakhir dibuat -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Invoice</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Jumlah Item</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($recent_orders)) : foreach ($recent_orders as $order) : ?>
                                    <tr>
                                        <td><?php echo $order->id; ?></td>
                                        <td><?php echo $order->nama; ?></td>
                                        <td><?php echo date('d-m-Y H:i', strtotime($order->tgl_pesan)); ?></td>
                                        <td><?php echo $order->item_count; ?></td>
                                        <td>Rp. <?php echo number_format($order->total_harga, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada pesanan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info Cepat</h6>
                </div>
                <div class="card-body">
                    <p>Total produk saat ini: <strong><?php echo $total_produk; ?></strong></p>
                    <p>Total invoice: <strong><?php echo $total_invoice; ?></strong></p>
                    <p>Total item terjual: <strong><?php echo $total_pesanan; ?></strong></p>
                    <p>Total pendapatan: <strong>Rp. <?php echo number_format($total_revenue, 0, ',', '.'); ?></strong></p>
                </div>
            </div>
        </div>
    </div>

</div>