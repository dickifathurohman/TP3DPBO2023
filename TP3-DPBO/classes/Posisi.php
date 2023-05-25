<?php

class Posisi extends DB
{
    function getPosisi()
    {
        $query = "SELECT * FROM posisi";
        return $this->execute($query);
    }

    function getPosisiById($id)
    {
        $query = "SELECT * FROM posisi WHERE posisi_id=$id";
        return $this->execute($query);
    }

    function searchPosisi($keyword){
        $query = "SELECT * FROM posisi WHERE posisi_nama LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addPosisi($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO posisi VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updatePosisi($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE posisi SET posisi_nama = '$nama' WHERE posisi_id = $id";
        return $this->executeAffected($query);
    }

    function deletePosisi($id)
    {
        $deldol = "DELETE FROM idol WHERE posisi_id = $id";
        $this->executeAffected($deldol);
        $query = "DELETE FROM posisi WHERE posisi_id=$id";
        return $this->executeAffected($query);
    }
}
