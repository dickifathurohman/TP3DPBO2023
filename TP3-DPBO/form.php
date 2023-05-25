<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Posisi.php');
include('classes/Idol.php');
include('classes/Template.php');

$view = new Template('templates/skinform.html');

// buat instance pengurus
$listIdol = new Idol($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listIdol->open();

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        //jika hasil addgrup nya lebih dari 0, ada data yang ditambah
        if ($listIdol->addIdol($_POST, $_FILES) > 0) {

            //tampilkan data berhasil di tambah
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'form.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
    $data['grup_id'] = 0;
    $data['posisi_id'] = 0;
    $data['idol_nama'] = "";
    $data['idol_nationality'] = "";
    $data['idol_lahir'] = "";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {

        $listIdol->getIdolById($id);
        $data = $listIdol->getResult();
        $btn = 'Update';
        $title = 'Ubah';

        if (isset($_POST['submit'])) {
            if ($listIdol->updateIdol($id, $_POST, $_FILES) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'form.php';
            </script>";
            }
        }
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($listIdol->deleteIdol($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
    }
}

$grup = new Grup($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$grup->open();
$grup->getGrup();
$selectedgrup = null;

while ($row = $grup->getResult()) {
    $selectedgrup .= "<option value=". $row['grup_id']. " ". (($row['grup_id'] == $data['grup_id']) ? "selected" : " " ). ">" . $row['grup_nama'] . "</option>";
}
$grup->close();

$posisi = new Posisi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$posisi->open();
$posisi->getPosisi();
$selectedposisi = null;

while ($row = $posisi->getResult()) {
    $selectedposisi .= "<option value=". $row['posisi_id']. " ". (($row['posisi_id'] == $data['posisi_id']) ? "selected" : " " ). ">" . $row['posisi_nama'] . "</option>";
}
$posisi->close();

$listIdol->close();

$view->replace('FORM_TITLE', $title);
$view->replace('OPTIONS_GRUP', $selectedgrup);
$view->replace('OPTIONS_POSISI', $selectedposisi);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_NAMA', $data['idol_nama']);
$view->replace('DATA_NATIONALITY', $data['idol_nationality']);
$view->replace('DATA_LAHIR', $data['idol_lahir']);
$view->write();

