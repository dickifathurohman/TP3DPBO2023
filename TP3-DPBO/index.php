<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Posisi.php');
include('classes/Idol.php');
include('classes/Template.php');

// buat instance pengurus
$listIdol = new Idol($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listIdol->open();
// tampilkan data pengurus
$listIdol->getIdolJoin();

// cari pengurus
if (isset($_POST['btn-cari'])) {
    // methode mencari data pengurus
    $listIdol->searchIdol($_POST['cari']);
} 
else if (isset($_POST['btn-nama'])){
    $listIdol->filterbyNama();
}
else if (isset($_POST['btn-grup'])){
    $listIdol->filterbyGrup();
}
else if (isset($_POST['btn-posisi'])){
    $listIdol->filterbyPosisi();
}
else {
    // method menampilkan data pengurus
    $listIdol->getIdolJoin();
}



$data = null;

// ambil data pengurus
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listIdol->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 idol-thumbnail">
        <a href="detail.php?id=' . $row['idol_id'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['idol_foto'] . '" class="card-img-top" alt="' . $row['idol_foto'] . '">
            </div>
            <div class="card-body">
                <p class="card-text idol-nama my-0">' . $row['idol_nama'] . '</p>
                <p class="card-text grup-nama">' . $row['grup_nama'] . '</p>
                <p class="card-text posisi-nama my-0">' . $row['posisi_nama'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listIdol->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_IDOL', $data);
$home->write();
