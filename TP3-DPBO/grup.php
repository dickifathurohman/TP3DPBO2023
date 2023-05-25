<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Template.php');


$grup = new Grup($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$grup->open();
$grup->getGrup();

if (isset($_POST['btn-cari'])) {
    // methode mencari data pengurus
    $grup->searchGrup($_POST['cari']);
} else {
    // method menampilkan data pengurus
    $grup->getGrup();
}

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        //jika hasil addgrup nya lebih dari 0, ada data yang ditambah
        if ($grup->addGrup($_POST) > 0) {

            //tampilkan data berhasil di tambah
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'grup.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'grup.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Grup';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Grup</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'grup';

while ($div = $grup->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['grup_nama'] . '</td>
    <td style="font-size: 22px;">
        <a href="grup.php?id=' . $div['grup_id'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="grup.php?hapus=' . $div['grup_id'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($grup->updateGrup($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'grup.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'grup.php';
            </script>";
            }
        }

        $grup->getGrupById($id);
        $row = $grup->getResult();

        $dataUpdate = $row['grup_nama'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($grup->deleteGrup($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'grup.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'grup.php';
            </script>";
        }
    }
}

$grup->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
