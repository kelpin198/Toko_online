<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="Slide 2">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

    <div class="row text-center mt-4">
        <?php foreach($barang as $brg) : ?>

            <div class="card ml-3 mb-3" style="width: 16rem;">
                <div style="height: 180px; display:flex; align-items:center; justify-content:center; overflow:hidden; background:#f8f9fc;">
                    <img src="<?php echo base_url().'uploads/'.$brg->gambar ?>" class="card-img-top" alt="<?php echo $brg->nama_brg; ?>" style="max-height: 160px; max-width: 300%; width: auto; height: auto; display:block;">
                </div>
                <div class="card-body d-flex flex-column" style="min-height: 190px;">
                    <h5 class="card-title mb-1"><?php echo $brg->nama_brg; ?></h5>
                    <small class="text-muted" style="min-height: 3rem; display: block;"><?php echo $brg->keterangan; ?></small>
                    <div class="mt-auto">
                        <span class="badge badge-pill badge-success mb-3 d-inline-block" style="min-width: 100px;">Rp. <?php echo number_format($brg->harga, 0, ',', '.'); ?></span>
                        <div class="d-flex justify-content-between">
                           <?php echo anchor('dasboard/tambah_ke_keranjang/'.$brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
                            <?php echo anchor('dasboard/detail_barang/'.$brg->id_brg, '<div class="btn btn-sm btn-success">Detail</div>') ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>