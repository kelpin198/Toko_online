<div class="container" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $judul; ?></h3>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo base_url('karyawan/update'); ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('karyawan'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>