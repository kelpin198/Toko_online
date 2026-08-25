<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'toko_online';

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_errno) {
    echo "Koneksi gagal: " . $mysqli->connect_error . "\n";
    exit(1);
}

$queries = [
    "CREATE TABLE IF NOT EXISTS `tb_invoice` (
        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `nama` VARCHAR(200) NOT NULL,
        `alamat` TEXT NOT NULL,
        `tgl_pesan` DATETIME NOT NULL,
        `batas_bayar` DATETIME NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
    "CREATE TABLE IF NOT EXISTS `tb_pesanan` (
        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `id_invoice` INT(11) UNSIGNED NOT NULL,
        `id_brg` INT(11) UNSIGNED NOT NULL,
        `nama_brg` VARCHAR(200) NOT NULL,
        `jumlah` INT(11) NOT NULL,
        `harga` DECIMAL(15,2) NOT NULL,
        PRIMARY KEY (`id`),
        INDEX (`id_invoice`),
        CONSTRAINT `fk_pesanan_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `tb_invoice`(`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
];

foreach ($queries as $query) {
    if (!$mysqli->query($query)) {
        echo "Query gagal: (" . $mysqli->errno . ") " . $mysqli->error . "\n";
        exit(1);
    }
}

echo "Tabel tb_invoice dan tb_pesanan berhasil dibuat atau sudah ada.\n";
$mysqli->close();
