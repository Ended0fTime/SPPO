<?php
    session_start();
    include('../Sys/authCheck.php');
    include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/info.css'>
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
            <h1> Maklumat Diri </h1>
        </div>

        <div class = 'content'>

            <p style = "font-size:22px;"> 
                ID: 
                <?php 
                        echo $_SESSION['idPengguna'];
                ?>
                <br><br>
                Nama:
                <?php 
                    if ($_SESSION['userType'] == 'peserta') {
                        $sql = "SELECT namaPeserta FROM peserta WHERE idPeserta = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        $sql = "SELECT namaHakim FROM hakim WHERE idHakim = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        $sql = "SELECT namaAdmin FROM admin WHERE idAdmin = '$_SESSION[idPengguna]'";
                    }
                    $result= $con->query($sql);  
                    $row = mysqli_fetch_assoc($result);
                    if ($_SESSION['userType'] == 'peserta') {
                        echo $row['namaPeserta'];
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        echo $row['namaHakim'];
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        echo $row['namaAdmin'];
                    }
                ?>
                <br><br>
                Kata Laluan:
                <?php 
                    if ($_SESSION['userType'] == 'peserta') {
                        $sql = "SELECT kataLaluanPeserta FROM peserta WHERE idPeserta = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        $sql = "SELECT kataLaluanHakim FROM hakim WHERE idHakim = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        $sql = "SELECT kataLaluanAdmin FROM admin WHERE idAdmin = '$_SESSION[idPengguna]'";
                    }
                    $result= $con->query($sql);  
                    $row = mysqli_fetch_assoc($result);
                    if ($_SESSION['userType'] == 'peserta') {
                        for ($i = 0; $i < strlen($row['kataLaluanPeserta']); $i++) {
                            echo '*';
                          } 
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        for ($i = 0; $i < strlen($row['kataLaluanHakim']); $i++) {
                            echo '*';
                          } 
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        for ($i = 0; $i < strlen($row['kataLaluanAdmin']); $i++) {
                            echo '*';
                          } 
                    }
                ?>
                <br><br>
                Umur:
                <?php 
                    if ($_SESSION['userType'] == 'peserta') {
                        $sql = "SELECT umurPeserta FROM peserta WHERE idPeserta = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        $sql = "SELECT umurHakim FROM hakim WHERE idHakim = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        $sql = "SELECT umurAdmin FROM admin WHERE idAdmin = '$_SESSION[idPengguna]'";
                    }
                    $result= $con->query($sql);  
                    $row = mysqli_fetch_assoc($result);
                    if ($_SESSION['userType'] == 'peserta') {
                        echo $row['umurPeserta'];
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        echo $row['umurHakim'];
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        echo $row['umurAdmin'];
                    }
                    
                ?>
                <br><br>
                Jantina:
                <?php 
                    if ($_SESSION['userType'] == 'peserta') {
                        $sql = "SELECT jantinaPeserta FROM peserta WHERE idPeserta = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        $sql = "SELECT jantinaHakim FROM hakim WHERE idHakim = '$_SESSION[idPengguna]'";
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        $sql = "SELECT jantinaAdmin FROM admin WHERE idAdmin = '$_SESSION[idPengguna]'";
                    }
                    $result= $con->query($sql);  
                    $row = mysqli_fetch_assoc($result);
                    if ($_SESSION['userType'] == 'peserta') {
                        echo $row['jantinaPeserta'];
                    }
                    else if ($_SESSION['userType'] == 'hakim') {
                        echo $row['jantinaHakim'];
                    }
                    else if ($_SESSION['userType'] == 'admin') {
                        echo $row['jantinaAdmin'];
                    }
                ?>
                <br>   
            </p>
            <form action = 'kemaskiniForm.php' method = 'POST'>
                <?php echo "<button id = 'btnchng' name = 'id' value = '$_SESSION[idPengguna]'> Kemaskini </button></a>"; ?>
            </form>

        </div>
    </div>
</body>
</html> 