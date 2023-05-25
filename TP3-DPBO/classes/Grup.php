<?php

class Grup extends DB
{
    function getGrup()
    {
        $query = "SELECT * FROM grup";
        return $this->execute($query);
    }

    function getGrupById($id)
    {
        $query = "SELECT * FROM grup WHERE grup_id=$id";
        return $this->execute($query);
    }

    function searchGrup($keyword){
        $query = "SELECT * FROM grup WHERE grup_nama LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addGrup($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO grup VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateGrup($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE grup SET grup_nama = '$nama' WHERE grup_id = $id";
        return $this->executeAffected($query);
    }

    function deleteGrup($id)
    {
        $deldol = "DELETE FROM idol WHERE grup_id = $id";
        $this->executeAffected($deldol);
        $query = "DELETE FROM grup WHERE grup_id = $id";
        return $this->executeAffected($query);
    }
}
