<div class="container-fluid">
   <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
       <div class="alert alert-success mb-4" role="alert">
        <?php
        $grand_total = 0;
        if($keranjang = $this->cart->contents())
        {
            foreach($keranjang as $item)
            {
                $grand_total = $grand_total + $item['subtotal'];
            }
            echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.')."</h4>";
        ?>
       </div>
         <h3>Input Alamat Pengiriman dan Pembayaran</h3>
         <form method="post" action="<?php echo base_url('dasboard/proses_pesanan'); ?>">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required>
                </div>
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" placeholder="No. Telepon Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jasa Pengiriman</label>
                <select name="jasa_pengiriman" class="form-control">
                    <option value="">Pilih Jasa Pengiriman</option>
                    <option value="JNE">JNE</option>
                    <option value="TIKI">TIKI</option>
                    <option value="POS Indonesia">POS Indonesia</option>
                    <option value="GoSend">GoSend</option>
                    <option value="GrabExpress">GrabExpress</option>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Bank</label>
                <select name="bank" class="form-control">
                    <option value="">Pilih Bank</option>
                    <option value="BCA">BCA - xxxxxx</option>
                    <option value="BNI">BNI - xxxxxx</option>
                    <option value="BRI">BRI - xxxxxx</option>
                    <option value="Mandiri">Mandiri - xxxxxx</option>
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            <?php echo anchor('dasboard', 'Lanjutkan Belanja', array('class' => 'btn btn-sm btn-secondary mb-3 ml-2')); ?>

         </form>
         <?php
         } else
         {
            echo "<h4>Keranjang Belanja Anda masih kosong, silahkan belanja dulu!!</h4>";
            echo anchor('dasboard', 'Lanjutkan Belanja', array('class' => 'btn btn-sm btn-secondary mt-3'));
         }
       ?>
    </div>
    <div class="col-md-2"></div>
</div>
</div>
