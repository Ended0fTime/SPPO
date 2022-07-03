<?php   
        session_start();
        include('connection.php');    

        $_SESSION['userType'] = $_POST['btn'];

        if ($_SESSION['userType'] == 'admin')   {
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

        if ($_SESSION['userType'] == 'admin') {
                $sql ="INSERT INTO `hakim` 
                (`idHakim`, `namaHakim`, `kataLaluanHakim`, `jantinaHakim`, `umurHakim`) 
                VALUES('$id', '$name', '$password', '$jantina', '$umur')";
                $con->query($sql); 

                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/form.css'><div></div>
                        <script>
                                alert('Hakim berjaya didaftarkan. ID hakim baru ialah $id');
                                window.location.href = '../Admin/daftarHakim.php';
                        </script>";

                // echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/form.css'>
                // <div id = 'frm'> <p  style='text-align:center;'> 
                // Hakim berjaya didaftarkan. </p><h3 style='text-align:center;'><a>ID hakim baru ialah $id.</a></h3>
                // <p style='text-align:center;'><a href='../Admin/daftarHakim.php'>Kembali</a></p></div>";
        }
        else if ($_SESSION['userType'] == 'peserta') {
                $sql ="INSERT INTO `peserta` 
                (`idPeserta`, `namaPeserta`, `kataLaluanPeserta`, `jantinaPeserta`, `umurPeserta`) 
                VALUES('$id', '$name', '$password', '$jantina', '$umur')";
                $con->query($sql);

                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'>
                        <div></div>
                        <script>
                                alert('Anda berjaya didaftarkan. ID anda ialah $id')
                        </script>";

                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'>
                        <div id = 'frm'>
                                <h3 style='text-align:center;'><a>ID anda ialah $id.</a></h3>
                                <p style='text-align:center;'><a href='../login.php'>Kembali</a></p>
                        </div>";

                // echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'>
                // <div id = 'frm'> <p  style='text-align:center;'> 
                // Anda berjaya didaftarkan. </p><h3 style='text-align:center;'><a>ID anda ialah $id.</a></h3>
                // <p style='text-align:center;'><a href='../login.php'>Kembali</a></p></div>";

                //$_SESSION["idPengguna"] = $id;
        }
?>

