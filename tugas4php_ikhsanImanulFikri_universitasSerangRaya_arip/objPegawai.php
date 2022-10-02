<?php 
require 'Pegawai.php';

$ikhsan = new Pegawai('11220115','Ikhsan', 'Manager', 'Islam', 'Sudah Menikah');
$imanul = new Pegawai('11220114', 'Imanul', 'Asisten', 'Islam', 'Belum Menikah');
$fikri = new Pegawai('11220113', 'Fikri', 'Kabag', 'Islam', 'Sudah Menikah');
$arnold = new Pegawai('11220112', 'Arnold', 'Staff', 'Hindu', 'Belum Menikah');
$yosua = new Pegawai('11220111', 'Yosua', 'Staff', 'Kristen', 'Belum Menikah');

echo '<h3 align="center">'.Pegawai::JUDUL.'</h3>';

$ikhsan->mencetak();
$imanul->mencetak();
$fikri->mencetak();
$arnold->mencetak();
$yosua->mencetak();

echo 'Jumlah Pegawai: '.Pegawai::$jml;
?>