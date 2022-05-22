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
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/table.css'>
<head>
<body>
    <div id = 'main'>

        <div class = 'title'>
            <h2> &nbsp Sistem Pengurusan Pertandingan Origami </h2>
        </div>

        <div class = 'ui'>
            <?php include('../lib/navbar.php'); ?>
        </div>
            
        <div class = 'heading'>
            <h1 style="text-align:center"> Senarai Ahli </h1>
        </div>
        
        <div class = 'content'>

            <b><p style="text-align:center; font-size:3.3vh;"> Peserta </p></b>

            <?php
                $sql = "SELECT * FROM peserta";

                $result= $con->query($sql); 

                echo "<form method = 'POST'>";
                echo "<table class = 'table' cellpadding = '10' border = '1'>\n";
                echo "<thead>\n";
                echo "<tr>\n";

                echo "<th>ID Peserta</th>\n";
                echo "<th>Nama </th>\n";
                echo "<th>Kata Laluan</th>\n";
                echo "<th>Jantina</th>\n";
                echo "<th>Umur</th>\n";
                echo "<th>Ubah</th>\n";

                echo "</tr>\n";
                echo "</thead>\n";
                echo "<tbody>\n";

                for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<tr>\n";
                    echo "<td>".$row['idPeserta']."</td>";
                    echo "<td>".$row['namaPeserta']."</td>";
                    echo "<td>".$row['kataLaluanPeserta']."</td>";
                    echo "<td>".$row['jantinaPeserta']."</td>";
                    echo "<td>".$row['umurPeserta']."</td>";
                    echo "<td> <button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$row[idPeserta]'>Kemaskini</button>
                            &nbsp | &nbsp 
                            <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$row[idPeserta]'>Padam</button></td>";
                }

                echo "</tbody>\n";
                echo "</table></form>";   
            ?>

            <br> <b><p style="text-align:center; font-size:3.3vh;"> Hakim </p></b>

            <?php
                $sql = "SELECT * FROM Hakim";

                $result= $con->query($sql); 

                echo "<form method = 'POST'>";
                echo "<table class = 'table' cellpadding = '10' border = '1'>\n";
                echo "<thead>\n";
                echo "<tr>\n";

                echo "<th>ID Hakim</th>\n";
                echo "<th>Nama </th>\n";
                echo "<th>Kata Laluan</th>\n";
                echo "<th>Jantina</th>\n";
                echo "<th>Umur</th>\n";
                echo "<th>Ubah</th>\n";

                echo "</tr>\n";
                echo "</thead>\n";
                echo "<tbody>\n";

                for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<tr>\n";
                    echo "<td>".$row['idHakim']."</td>";
                    echo "<td>".$row['namaHakim']."</td>";
                    echo "<td>".$row['kataLaluanHakim']."</td>";
                    echo "<td>".$row['jantinaHakim']."</td>";
                    echo "<td>".$row['umurHakim']."</td>";
                    echo "<td> <button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$row[idHakim]'>Kemaskini</button>
                            &nbsp | &nbsp 
                            <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$row[idHakim]'>Padam</button></td>";
                }

                echo "</tbody>\n";
                echo "</table></form>";   
            ?>
        </div>
    </div>
</body>
</html>