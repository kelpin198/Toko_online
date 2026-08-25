<div class="container" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $judul; ?></h3>
            <a href="<?php echo base_url('karyawan/tambah');?>" class="btn btn-success btn-sm">Tambah Karyawan Baru</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($karyawan as $k): ?>
                    <tr>
                        <td><?php echo $k['id']?></td>
                        <td><?php echo $k['nama']?></td>
                        <td><?php echo $k['alamat']?></td>
                        <td><?php echo $k['tanggal_lahir']?></td>
                        <td>
                            <a href="<?php echo site_url('karyawan/get_edit/'.$k['id']);?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="<?php echo site_url('karyawan/hapus/'.$k['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>