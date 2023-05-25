<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Posisi.php');
include('classes/Idol.php');
include('classes/Template.php');

$idol = new Idol($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$idol->open();

$data = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $idol->getIdolById($id);
        $row = $idol->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['idol_nama'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['idol_foto'] . '" class="img-thumbnail" alt="' . $row['idol_foto'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['idol_nama'] . '</td>
                                </tr>
                                <tr>
                                    <td>Nationality</td>
                                    <td>:</td>
                                    <td>' . $row['idol_nationality'] . '</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>' . date('d F Y', strtotime($row['idol_lahir'])) . '</td>
                                </tr>
                                <tr>
                                    <td>Grup</td>
                                    <td>:</td>
                                    <td>' . $row['grup_nama'] . '</td>
                                </tr>
                                <tr>
                                    <td>Posisi</td>
                                    <td>:</td>
                                    <td>' . $row['posisi_nama'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="form.php?id='.$row['idol_id'].'"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="form.php?hapus='.$row['idol_id'].'"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$idol->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_IDOL', $data);
$detail->write();
