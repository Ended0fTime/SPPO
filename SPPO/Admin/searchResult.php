<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include ('../Sys/connection.php');

    $id = $_POST['search'];
    $userType = substr_replace($id, '', 1, 1);

    if($userType == 'P') {
        $sql = "SELECT * FROM peserta WHERE idPeserta = '$id'";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);
    
        $sql2 = "SELECT * FROM markah WHERE idPeserta = '$id'";
        $result2 = $con->query($sql2);
        $row2 = mysqli_fetch_assoc($result2);

        if(isset($row)) {
            $userID = $row['idPeserta'];
            $userName = $row['namaPeserta'];
            $userPS = $row['kataLaluanPeserta'];
            $userSex = $row['jantinaPeserta'];
            $userAge = $row['umurPeserta'];

            if(isset($row2)) {
                $langkah = $row2['langkah'];
                $kelihatan = $row2['kelihatan'];
                $keaslian = $row2['keaslian'];
                $jumlah = $row2['jumlahMarkah'];
            }
        }
        else {
            noResult();        
        }
    }
    else if($userType == 'H') {
        $sql = "SELECT * FROM hakim WHERE idHakim = '$id'";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);

        if(isset($row)) {
            $userID = $row['idHakim'];
            $userName = $row['namaHakim'];
            $userPS = $row['kataLaluanHakim'];
            $userSex = $row['jantinaHakim'];
            $userAge = $row['umurHakim'];
        }
        else {
            noResult();
        }
    }
    else if($userType == 'A') {
        $sql = "SELECT * FROM admin WHERE idAdmin = '$id'";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);

        if(isset($row)) {
            $userID = $row['idAdmin'];
            $userName = $row['namaAdmin'];
            $userPS = $row['kataLaluanAdmin'];
            $userSex = $row['jantinaAdmin'];
            $userAge = $row['umurAdmin'];
        }
        else {
            noResult();
        }
    }
    else {
        noResult();
    }
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/senarai.css'>
<head>
<body>
    <div class = 'main'>

        <div class = 'title'>
            <h2> &nbsp Sistem Pengurusan Pertandingan Origami </h2>
        </div>

        <div class = 'ui'>
            <?php include('../lib/navbar.php'); ?>
        </div>
            
        <div class = 'heading'>
            <h1 style="text-align:center"> Senarai Ahli </h1>
        </div>
        
        <div class = 'content' >

            <form method = "POST" action="searchResult.php" class = 'searchBarForm'>
                <input type="text" class = "searchBar" name ="search" placeholder="Cari ID..." onkeyup="this.value = this.value.toUpperCase();">
            </form>

            <form method = 'POST' class = 'frm'>
            <?php

                    echo "ID: <b>$userID</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Nama: <b>$userName</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Kata Laluan: <b>$userPS</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Jantina: <b>$userSex</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Umur: <b>$userAge</b> &nbsp &nbsp &nbsp &nbsp &nbsp";
                
                    if (isset($row2)) {
                        echo "
                            <p>Markah Langkah: <b>$langkah</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                            Markah Kelihatan: <b>$kelihatan</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                            Markah Keaslian: <b>$keaslian</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                            Jumlah Markah: <b>$jumlah</b> &nbsp &nbsp &nbsp &nbsp &nbsp</p>";

                    }

                    echo "<p><button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$userID'>Kemaskini</button>
                    &nbsp | &nbsp 
                    <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$userID'>Padam</button>";
                    if (isset($row2)) {
                        echo "
                        &nbsp | &nbsp 
                        <button class ='editDelete' formaction='../Sys/cetak.php' name='id' value='$userID'> Cetak Keputusan </button>";
                    }
            ?>
             </form>
        </div>
</body>
</html>

<?php
function noResult() {
    echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/senarai.css'><div></div>";
    echo "<script> alert('ID tidak dikenali'); window.location.href='senarai.php'; </script>";
}
?>