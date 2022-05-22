<?php    
        session_start();
        include_once('authCheck.php');
        include('connection.php');

        $id = $_POST['id'];
        $name = $_POST['nama'];  
        $password = $_POST['pass'];  
        $jantina = $_POST['jantina'];
        $umur = $_POST['umur'];

        if (substr_replace($id, '', 1, 1) == 'P') {
                $sql = "UPDATE `peserta` 
                SET `namaPeserta` = '$name', `kataLaluanPeserta` = '$password', 
                `jantinaPeserta` = '$jantina', `umurPeserta` = '$umur' 
                WHERE `peserta`.`idPeserta` = '$id'; "; 
        }
        else if (substr_replace($id, '', 1, 1) == 'H'){
                $sql = "UPDATE `hakim` 
                SET `namaHakim` = '$name', `kataLaluanHakim` = '$password', 
                `jantinaHakim` = '$jantina', `umurHakim` = '$umur' 
                WHERE `hakim`.`idHakim` = '$id'; "; 
        }
        else if (substr_replace($id, '', 1, 1) == 'A'){
                $sql = "UPDATE `admin` 
                SET `namaAdmin` = '$name', `kataLaluanAdmin` = '$password', 
                `jantinaAdmin` = '$jantina', `umurAdmin` = '$umur' 
                WHERE `admin`.`idadmin` = '$id'; "; 
        }
        else {
                kickBack();
        }
        $con->query($sql);

        if ($_SESSION['userType'] == 'admin' && substr_replace($id, '', 1, 1) != 'A') {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/form.css'><div></div>
                        <script>
                                alert('Maklumat berjaya dikemaskini')
                                window.location.href = '../Admin/senarai.php'
                        </script>";
        }
        else {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/form.css'><div></div>
                        <script>
                                alert('Maklumat anda berjaya dikemaskini')
                                window.location.href = '../General/info.php'
                        </script>";
        }
        
        // echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/form.css'>
        // <div class = 'main'><div class = 'content'></div>
        // <div class = 'frm'><p style='text-align:center;margin-top:12%;'>Maklumat anda berjaya dikemaskini.
        // <p style='text-align:center;'><a href='../General/info.php'>Kembali</a></p></div></div>";
?>