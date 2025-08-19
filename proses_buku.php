<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_buku.css">
    <title>TOKO BUKU</title>
</head>

<body>
    <!--NAVIGASI-->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">INPUT BUKU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="proses_buku.php">DATA BUKU</a>
                </div>
            </div>
        </div>
    </nav>
  

<?php
define('FILE_JSON', 'data_buku.json');

function cekFileJson() {
       if (!file_exists(FILE_JSON)) {
             file_put_contents(FILE_JSON, json_encode([]));
        }

        $json = file_get_contents(FILE_JSON);
        return json_decode(file_get_contents(FILE_JSON), true);

}

$data_buku = cekFileJson();
$total_data = count($data_buku);

if ($total_data == 0) {
    echo "<p>Belum ada buku yang disimpan </p>";

} else {
    echo "<table border= '1'>
     <div class='mt-5'></div>
    <h3 class='text-center'>SISTEM PENDATAAN BUKU</h3>
    <tr>
    
        <th>KODE BUKU</th>
        <th>JUDUL BUKU</th>
        <th>KATEGORI BUKU</th>
        <th>PENERBIT BUKU</th>
        <th>HARGA BUKU</th>
            
    </tr>";

    for ($i = 0; $i < $total_data; $i++) 
    {
            $buku = $data_buku[$i];

            // Menampilkan kode buku
            echo "<td class='text-center'>" . htmlspecialchars($buku['kode']) . "</td>";

            // Menampilkan judul buku
            echo "<td class='text-center'>" . htmlspecialchars($buku['judul']) . "</td>";

              // Menampilkan kategori buku
            echo "<td class='text-center'>" . htmlspecialchars($buku['kategori']) . "</td>";

              // Menampilkan penerbit buku
            echo "<td class='text-center'>" . htmlspecialchars($buku['penerbit']) . "</td>";

              // Menampilkan harga buku
            echo "<td class='text-center'>" . htmlspecialchars($buku['harga']) . "</td>";
            echo "</tr>";    
           
    }
        echo "</table>";
        echo "<center><button onclick=\"window.location.href='index.html'\">+</button></center>";

}


/* start =kiri, end=kanan*/
    
?>

</body>
</html>


