<?php
    session_start();
    include('../Sys/authCheck.php');
    include('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/table.css'>
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
            <h1 style="text-align:center"> Keputusan Pertandingan </h1>
        </div>
        
        <div class = 'content'>
            <?php
                $sql = "SELECT idPeserta, FIND_IN_SET(jumlahMarkah, 
                        (SELECT GROUP_CONCAT(jumlahMarkah ORDER BY jumlahMarkah DESC) FROM markah)) AS rank 
                        FROM markah ORDER BY jumlahMarkah DESC";
                $sql2 = "SELECT idPeserta FROM markah 
                        ORDER BY jumlahMarkah DESC";
                $sql3 = "SELECT peserta.namaPeserta FROM peserta 
                         JOIN markah ON markah.idPeserta = peserta.idPeserta ORDER BY jumlahMarkah DESC";
                $sql4 = "SELECT markah.jumlahMarkah FROM markah
                         ORDER BY jumlahMarkah DESC";
                $sql5 = "SELECT markah.komenHakim FROM markah 
                         ORDER BY jumlahMarkah DESC";

                $result= $con->query($sql); 
                $result2= $con->query($sql2); 
                $result3= $con->query($sql3);
                $result4= $con->query($sql4);
                $result5= $con->query($sql5); 

                echo "<table class = 'table' cellpadding = '10' border = '1'>\n";
                echo "<thead>\n";
                echo "<tr>\n";

                echo "<th>Tempat</th>\n";
                echo "<th>ID Peserta</th>\n";
                echo "<th>Nama Peserta</th>\n";
                echo "<th>Jumlah Markah</th>\n";
                echo "<th>Komen Hakim</th>\n";

                echo "</tr>\n";
                echo "</thead>\n";
                echo "<tbody>\n";

                    for ($i=0; $i < mysqli_num_rows($result2); $i++) {
                        $row = mysqli_fetch_assoc($result);
                        $row2 = mysqli_fetch_assoc($result2);
                        $row3 = mysqli_fetch_assoc($result3);
                        $row4 = mysqli_fetch_assoc($result4);
                        $row5 = mysqli_fetch_assoc($result5);
                        echo "<tr>\n";
                        echo "<td>".$row['rank']."</td>";
                        echo "<td>".$row2['idPeserta']."</td>";
                        echo "<td>".$row3['namaPeserta']."</td>";
                        echo "<td>".$row4['jumlahMarkah']."</td>";
                        echo "<td>".$row5['komenHakim']."</td>";
                    }

                echo "</tbody>\n";
                echo "</table>";   
            ?>
        </div>
    </div>
</body>
</html>