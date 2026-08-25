<a href="<?php echo base_url('anggota/tambah');?>" >Tambah Anggota Baru</a>

<TABLE>
    <th>ANGGOTA</th>
    <TH>ALAMAT</TH>
    <TH>UBAH</TH>
    <TH>HAPUS</TH>
    <?php foreach ($anggota as $a): ?>
    <TR>
        <TD><?php echo $a['namaanggota']?></TD>
        <TD><?php echo $a['alamat']?></TD>
        <TD><a href="<?php echo site_url('anggota/get_edit/'.$a['idanggota']);?>" > UBAH </a></TD>
        <TD><a href="<?php echo site_url('anggota/hapus/'.$a['idanggota']);?>" > HAPUS </a></TD>
    </TR>
 <?php endforeach; ?>

</TABLE>