<?php

class Idol extends DB
{
    function getIdolJoin()
    {
        $query = "SELECT * FROM idol JOIN grup ON idol.grup_id=grup.grup_id JOIN posisi ON idol.posisi_id=posisi.posisi_id ORDER BY idol.idol_id";

        return $this->execute($query);
    }

    function getIdol()
    {
        $query = "SELECT * FROM idol";
        return $this->execute($query);
    }

    function getIdolById($id)
    {
        $query = "SELECT * FROM idol JOIN grup ON idol.grup_id=grup.grup_id JOIN posisi ON idol.posisi_id=posisi.posisi_id WHERE idol_id=$id";
        return $this->execute($query);
    }

    function searchIdol($keyword)
    {
        $query = "SELECT * FROM idol JOIN grup ON idol.grup_id=grup.grup_id JOIN posisi ON idol.posisi_id=posisi.posisi_id WHERE idol_nama LIKE '%$keyword%' or grup_nama LIKE '%$keyword%' or posisi_nama LIKE '%$keyword%' ORDER BY idol.idol_id";

        return $this->execute($query);
    }

    function addIdol($data, $file)
    {
        
        $nama = $data['nama'];
        $lahir = $data['lahir'];
        $nationality = $data['nationality'];
        $grup_id = $data['grup'];
        $posisi_id = $data['posisi'];

        $getFoto = $file['file_image']['tmp_name'];
        $foto = $file['file_image']['name'];
        
        $dir = "assets/images/$foto";
        move_uploaded_file($getFoto, $dir);

        $query = "INSERT INTO idol VALUES ('', '$nama', '$foto', '$lahir', '$nationality', '$grup_id', '$posisi_id')";
        
        return $this->executeAffected($query);
    }

    function updateIdol($id, $data, $file)
    {
        $nama = $data['nama'];
        $lahir = $data['lahir'];
        $nationality = $data['nationality'];
        $grup_id = $data['grup'];
        $posisi_id = $data['posisi'];

        $getFoto = $file['file_image']['tmp_name'];
        $foto = $file['file_image']['name'];
        
        $dir = "assets/images/$foto";
        move_uploaded_file($getFoto, $dir);

        $query = "UPDATE idol SET idol_nama = '$nama', idol_nationality = '$nationality', idol_lahir = '$lahir', idol_foto = '$foto', grup_id = '$grup_id', posisi_id = '$posisi_id' WHERE idol_id = $id";

        return $this->executeAffected($query);
    }

    function deleteIdol($id)
    {
        $query = "DELETE FROM idol WHERE idol_id = $id";
        return $this->executeAffected($query);
    }

    function filterbyNama(){
        $query = "SELECT * FROM idol JOIN grup ON idol.grup_id=grup.grup_id JOIN posisi ON idol.posisi_id=posisi.posisi_id ORDER BY idol.idol_nama";
        return $this->execute($query);
    }

    function filterbyGrup(){
        $query = "SELECT * FROM idol JOIN grup ON idol.grup_id=grup.grup_id JOIN posisi ON idol.posisi_id=posisi.posisi_id ORDER BY grup.grup_nama";
        return $this->execute($query);
    }

    function filterbyPosisi(){
        $query = "SELECT * FROM idol JOIN grup ON idol.grup_id=grup.grup_id JOIN posisi ON idol.posisi_id=posisi.posisi_id ORDER BY posisi.posisi_nama";
        return $this->execute($query);
    }
}
