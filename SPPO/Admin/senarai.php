<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include ('../Sys/connection.php');
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
            <h1 style="text-align: center"> Senarai Pengguna </h1>
        </div>
        
        <div class = 'content'>

            <b><p style="text-align:center; font-size:3.3vh;"> Peserta </p></b>

            <form method = "POST" action="searchResult.php">
                <input type="text" class = "searchBar" name ="search" placeholder="Cari ID..." onkeyup="this.value = this.value.toUpperCase();">
            </form>

            <?php
                $sql = "SELECT * FROM peserta";
                $result= $con->query($sql); 
                $sql2 = "SELECT * FROM markah";
                $result2= $con->query($sql2); 

                echo "<form method = 'POST'><ul class = 'searchQ' id='searchQPeserta'>";

                for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);
                    $row2 = mysqli_fetch_assoc($result2);
                    
                    echo "<li><p>
                    ID: <b>$row[idPeserta]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Nama: <b>$row[namaPeserta]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Kata Laluan: <b>$row[kataLaluanPeserta]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Jantina: <b>$row[jantinaPeserta]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Umur: <b>$row[umurPeserta]</b> &nbsp &nbsp &nbsp &nbsp &nbsp";

                    if (isset($row2)) {
                        echo "
                        <p>Markah Langkah: <b>$row2[langkah]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                        Markah Kelihatan: <b>$row2[kelihatan]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                        Markah Keaslian: <b>$row2[keaslian]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                        Jumlah Markah: <b>$row2[jumlahMarkah]</b> &nbsp &nbsp &nbsp &nbsp &nbsp</p>";
                    }

                    echo "<p><button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$row[idPeserta]'>Kemaskini</button>
                    &nbsp | &nbsp 
                    <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$row[idPeserta]'>Padam</button>";
                    if (isset($row2)) {
                        echo "
                        &nbsp | &nbsp 
                        <button class ='editDelete' formaction='../Sys/cetak.php' name='id' value='$row[idPeserta]'> Cetak Keputusan </button>";
                    }
                    echo "</p></li>";
                }

                echo "</ul></form>";
            ?>

            <!-- Hakim Section --> <br><br><br>

            <b><p style="text-align:center; font-size:3.3vh;"> Hakim </p></b>

            <form method = "POST" action="searchResult.php">
                <input type="text" class = "searchBar" name ="search" placeholder="Cari ID...">
            </form>
            <?php
                $sql = "SELECT * FROM hakim";
                $result= $con->query($sql); 

                echo "<form method = 'POST'><ul class = 'searchQ' id='searchQHakim'>";

                for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);

                    echo "<li><p>
                    ID: <b>$row[idHakim]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Nama: <b>$row[namaHakim]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Kata Laluan: <b>$row[kataLaluanHakim]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Jantina: <b>$row[jantinaHakim]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Umur: <b>$row[umurHakim]</b> &nbsp &nbsp &nbsp &nbsp &nbsp

                    <p><button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$row[idHakim]'>Kemaskini</button>
                    &nbsp | &nbsp 
                    <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$row[idHakim]'>Padam</button></p>

                    </p></li>";
                }

                echo "</ul></form>";
            ?>

            <!-- Admin Section --> <br><br><br>

            <b><p style="text-align:center; font-size:3.3vh;"> Admin </p></b>

            <form method = "POST" action="searchResult.php">
                <input type="text" class = "searchBar" name ="search" placeholder="Cari ID...">
            </form>

            <?php
                $sql = "SELECT * FROM admin";
                $result= $con->query($sql); 

                echo "<form method = 'POST'><ul class = 'searchQ' id='searchQAdmin'>";

                for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);

                    echo "<li><p>
                    ID: <b>$row[idAdmin]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Nama: <b>$row[namaAdmin]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Kata Laluan: <b>$row[kataLaluanAdmin]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Jantina: <b>$row[jantinaAdmin]</b> &nbsp &nbsp &nbsp &nbsp &nbsp
                    Umur: <b>$row[umurAdmin]</b> &nbsp &nbsp &nbsp &nbsp &nbsp

                    <p><button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$row[idAdmin]'>Kemaskini</button>
                    &nbsp | &nbsp 
                    <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$row[idAdmin]'>Padam</button></p>

                    </p></li>";
                }

                echo "</ul></form>";
            ?>
        </div>
    </div>
</body>
</html>