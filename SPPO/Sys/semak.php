<?php  
    session_start();
    include('authCheck.php');  
    include('connection.php');  

    $sql = "SELECT idMarkah FROM markah ORDER BY idMarkah DESC LIMIT 1";
    $result= $con->query($sql);  
    $row = mysqli_fetch_assoc($result); 
    $number = ltrim($row['idMarkah'],'M')+1;  

    $idMarkah = 'M' . $number;  
    $idPeserta = $_POST['idPeserta'];
    $langkah = $_POST['langkah'] *0.04;
    if ($langkah > 10) { $langkah = 10; }
    $keaslian = $_POST['keaslian'] *45/100;
    $kelihatan = $_POST['kelihatan'] *45/100;
    $jumlah = round($langkah + $keaslian + $kelihatan);
    $komen = $_POST['komen'];

    if ($idPeserta[0] == 'S') {
        $idPeserta = ltrim($idPeserta, 'S');
        $sql ="UPDATE `markah` 
               SET `langkah` = '$langkah', `keaslian` = '$keaslian', `kelihatan` = '$kelihatan', `jumlahMarkah` = '$jumlah', 
               `komenHakim` = '$komen'
               WHERE `markah`.`idPeserta` = '$idPeserta'; ";
        $con->query($sql);

        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/semakHakim.css'>
              <div class = 'main'>
                    <p style='position:relative;text-align:center;margin-top:11%;padding-top:6%;'>Markah karya berjaya dikemaskini.
                    <p style='position:relative;text-align:center;'><a href='../Hakim/semakHakim.php'>Kembali</a></p>
              </div>";
    }
    
    else if ($idPeserta[0] == 'P') {
        $sql ="INSERT INTO `markah` 
            (`idMarkah`, `idPeserta`, `langkah`, `keaslian`, `kelihatan`, `jumlahMarkah`, `komenHakim`) 
            VALUES('$idMarkah', '$idPeserta', '$langkah', '$keaslian', '$kelihatan', '$jumlah', '$komen')";
        $con->query($sql);
        
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/semakHakim.css'>
              <div class = 'main'>
                    <p style='position:relative;text-align:center;margin-top:11%;padding-top:6%;'>Karya berjaya disemak.
                    <p style='position:relative;text-align:center;'><a href='../Hakim/semakHakim.php'>Kembali</a></p>
              </div>";
    }
?>