<?php

define('FILE_JSON' , 'data_buku.json');

/*Prosedur untuk cek file*/
function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

/*Fungsi untuk membaca data dari file JSON*/
function bacaDataJson() {
    return json_decode(file_get_contents(FILE_JSON), true);

}

/*METODE PENGIRIMAN*/
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
 // PANGGIl prosedur file cekFileJson()
    cekFileJson();

    $kode= $_POST['kode'];
    $judul= $_POST['judul'];
    $kategori= $_POST['kategori'];
    $penerbit= $_POST['penerbit'];
    $harga= $_POST['harga'];

    $data_buku = bacaDataJson();

/*MENAMBAHKAN DATA BARU KE ARRAY*/
    $data_buku [] = [
            'kode'  => $kode,
            'judul'  => $judul,
            'kategori'  => $kategori,
            'penerbit'  => $penerbit,
            'harga'  => $harga
    ];

    file_put_contents(FILE_JSON, json_encode($data_buku, JSON_PRETTY_PRINT));

 echo "<script>alert('buku berhasil ditambahkan!');</script>";

 echo"<script>window.location.href = 'proses_buku.php'</script>";
}


?>

