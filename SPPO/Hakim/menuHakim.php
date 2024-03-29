<?php
    session_start();
    include('../Sys/authCheck.php');
    validHakim();
    include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/menu.css'>
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
            <h1 style = "display: inline-block;"> 
                <?php 
                    if (date('H')+6 < 12) {
                        echo "Selamat Pagi, ";
                    }
                    else if (date('H')+6 >= 20) {
                        echo "Selamat Malam, ";
                    }
                    else {
                        echo "Selamat Petang, ";
                    }

                    $sql = "SELECT namaHakim FROM hakim WHERE idHakim = '$_SESSION[idPengguna]'";
                    $result= $con->query($sql);  
                    $row = mysqli_fetch_assoc($result);
                    echo $row['namaHakim']; 
                    $result->close(); 
                ?>
            </h1>
        </div>

        <div class = 'content'>

            <a href='../General/info.php'><button class = 'btn' name = 'hakim' > Maklumat Diri </button></a>
            <br><br>
            <a href='semakHakim.php'><button class = 'btn' name = 'hakim' > Semak Karya</button></a>
            <br><br>
            <a href='../General/keputusan.php'><button class = 'btn'> Keputusan Pertandingan </button></a>
            <br><br>
            <a href='../General/gallery.php'><button class = 'btn'> Galeri </button></a>

        </div>
    </div>
</body>
</html>