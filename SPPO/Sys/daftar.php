<?php   
        session_start();
        include('connection.php');    

        if ($_POST['regType'] == 'admin')   {
                $sql = "SELECT idAdmin FROM admin ORDER BY idAdmin DESC LIMIT 1";
                $result= $con->query($sql);  
                $row = mysqli_fetch_assoc($result); 
                $number = ltrim($row['idAdmin'],'A')+1;  
                $id = 'A' . $number;           
        } 
        else if ($_POST['regType'] == 'hakim')   {
                $sql = "SELECT idHakim FROM hakim ORDER BY idHakim DESC LIMIT 1";
                $result= $con->query($sql);  
                $row = mysqli_fetch_assoc($result); 
                if (isset($row['idHakim'])) {
                        $number = ltrim($row['idHakim'],'H')+1;  
                        $id = 'H' . $number;  
                }
                else {
                        $id = "H1";
                }
                
        } 
        else {                                                                                        
                $sql = "SELECT idPeserta FROM peserta ORDER BY idPeserta DESC LIMIT 1";
                $result= $con->query($sql);  
                $row = mysqli_fetch_assoc($result); 
                if (isset($row['idPeserta'])) {
                        $number = ltrim($row['idPeserta'],'P')+1;  
                        $id = 'P' . $number;   
                }
                else {
                        $id = "P1";
                }
                
        }

        $name = $_POST['nama'];  
        $password = $_POST['pass'];  
        $jantina = $_POST['jantina'];
        $umur = $_POST['umur'];


        if ($_POST['regType'] == 'admin') {
                $sql ="INSERT INTO `admin` 
                (`idadmin`, `namaadmin`, `kataLaluanadmin`, `jantinaadmin`, `umuradmin`) 
                VALUES('$id', '$name', '$password', '$jantina', '$umur')";
                $con->query($sql); 

                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/menu.css'><div></div>
                        <script>
                                alert('Admin berjaya didaftarkan. ID admin baharu ialah $id');
                                window.location.href = '../Admin/daftarAhli.php';
                        </script>";
        }
        else if ($_POST['regType'] == 'hakim') {
                $sql ="INSERT INTO `hakim` 
                (`idHakim`, `namaHakim`, `kataLaluanHakim`, `jantinaHakim`, `umurHakim`) 
                VALUES('$id', '$name', '$password', '$jantina', '$umur')";
                $con->query($sql); 

                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/menu.css'><div></div>
                        <script>
                                alert('Hakim berjaya didaftarkan. ID hakim baharu ialah $id');
                                window.location.href = '../Admin/daftarAhli.php';
                        </script>";
        }
        else {
                $sql ="INSERT INTO `peserta` 
                (`idPeserta`, `namaPeserta`, `kataLaluanPeserta`, `jantinaPeserta`, `umurPeserta`) 
                VALUES('$id', '$name', '$password', '$jantina', '$umur')";
                $con->query($sql);

                if (isset($_SESSION['userType'])) {
                        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'>
                                <div></div>
                                <script>
                                        alert('Anda berjaya didaftarkan. ID peserta baharu ialah $id');
                                        window.location.href = '../Admin/daftarAhli.php';
                                </script>";
                }
                else {
                        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'>
                                <div></div>
                                <script>
                                        alert('Anda berjaya didaftarkan. ID anda ialah $id');
                                        window.location.href = '../login.php';
                                </script>";
                }
        }
?>

