<?php  
    //data check
    if (!isset($_POST['idPeserta'])) {
      echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'><div></div>
      <script> alert('Sila login.'); window.location.href='../login.php' </script>";
    }

    session_start();
    include('connection.php');  

    $sql = "SELECT idMarkah FROM markah ORDER BY idMarkah DESC LIMIT 1";
    $result= $con->query($sql);  
    $row = mysqli_fetch_assoc($result); 
    if (isset($row['idMarkah'])) {
      $number = ltrim($row['idMarkah'],'M')+1;  
      $idMarkah = 'M' . $number;  
    }
    else {
      $idMarkah = 'M1';
    }

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

        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'><div></div> 
              <script> 
                alert('Markah $idPeserta berjaya dikemaskini'); 
                window.location.href='../Hakim/semakHakim.php' 
              </script>";
    }
    
    else if ($idPeserta[0] == 'P') {
        $sql ="INSERT INTO `markah` 
            (`idMarkah`, `idPeserta`, `langkah`, `keaslian`, `kelihatan`, `jumlahMarkah`, `komenHakim`) 
            VALUES('$idMarkah', '$idPeserta', '$langkah', '$keaslian', '$kelihatan', '$jumlah', '$komen')";
        $con->query($sql);
        
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'><div></div> 
              <script> 
                alert('Karya $idPeserta berjaya disemak'); 
                window.location.href='../Hakim/semakHakim.php' 
              </script>";
    }
?>