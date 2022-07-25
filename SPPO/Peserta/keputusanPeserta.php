<?php
    session_start();
    include('../Sys/authCheck.php');
    validPeserta();
    include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/keputusanPeserta.css'>
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
            <h1> Keputusan Pertandingan </h1>
        </div>

        <div class = 'content'>

                <?php 
                    $sql = "SELECT jumlahMarkah FROM markah WHERE idPeserta = '$_SESSION[idPengguna]'";
                    $result = $con->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    if (isset($row)) {

                        echo "<h3> Tempat anda: &nbsp";
                        $sql = "SELECT idPeserta, FIND_IN_SET(jumlahMarkah, 
                        (SELECT GROUP_CONCAT(jumlahMarkah ORDER BY jumlahMarkah DESC) FROM markah)) AS rank FROM markah
                        WHERE idPeserta = '$_SESSION[idPengguna]'";
                        $result = $con->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<h2 style = 'margin-left: -1%;'>$row[rank]</h2>";
                        echo "</h3>";
                        
                        echo "<p> Jumlah markah: &nbsp";
                        $sql = "SELECT jumlahMarkah FROM markah WHERE idPeserta = '$_SESSION[idPengguna]'";
                        $result = $con->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<b>$row[jumlahMarkah]</b>";
                        echo "</p>";

                        echo "<p> Markah langkah: &nbsp";
                        $sql = "SELECT langkah FROM markah WHERE idPeserta = '$_SESSION[idPengguna]'";
                        $result = $con->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "$row[langkah]";
                        echo "/10</p>";

                        echo "<p> Markah keaslian: &nbsp";
                        $sql = "SELECT keaslian FROM markah WHERE idPeserta = '$_SESSION[idPengguna]'";
                        $result = $con->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "$row[keaslian]";
                        echo "/45</p>";

                        echo "<p> Markah kelihatan: &nbsp";
                        $sql = "SELECT kelihatan FROM markah WHERE idPeserta = '$_SESSION[idPengguna]'";
                        $result = $con->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "$row[kelihatan]";
                        echo "/45</p>"; 

                        echo "<a href='../General/keputusan.php'><button id = 'btnkeputusan' name ='btn'> Keputusan Seluruh </button></a>";
                    }
                    else {
                        echo "<br><br><p style = 'padding: 0 25% 0 25%; white-space: nowrap;'> Karya anda masih belum disemak. Sila bersabar. </p>";
                        echo "<a href='../General/keputusan.php'><button id = 'btnkeputusan2' name ='btn'> Keputusan Seluruh </button></a>";
                    }
                ?> 

        </div>
    </div>
</body>

</html>

