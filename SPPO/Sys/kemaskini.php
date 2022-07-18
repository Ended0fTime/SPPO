<?php    
        session_start();
        include_once('authCheck.php');
        include('connection.php');

        $id = $_POST['id'];
        $userType = substr_replace($id, '', 1, 1);

        if ($_POST['nama'] != "") {
                $name = $_POST['nama'];  
                $sql = updateName($userType, $id, $name);
                $con->query($sql);
        }
        if ($_POST['pass'] != "") {
                $password = $_POST['pass'];  
                $sql = updatePass($userType, $id, $password);
                $con->query($sql);
        }
        if ( isset($_POST['jantina']) && $_POST['jantina'] != "") {
                $jantina = $_POST['jantina'];
                $sql = updateSex($userType, $id, $jantina);
                $con->query($sql);
        }
        if ($_POST['umur'] != "") {
                $umur = $_POST['umur'];
                $sql = updateAge($userType, $id, $umur);
                $con->query($sql);
        }

        if ($_SESSION['userType'] == 'admin' && $userType != 'A') {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/menu.css'><div></div>
                        <script>
                                alert('Maklumat berjaya dikemaskini')
                                window.location.href = '../Admin/senarai.php'
                        </script>";
        }
        else {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/menu.css'><div></div>
                        <script>
                                alert('Maklumat anda berjaya dikemaskini')
                                window.location.href = '../General/info.php'
                        </script>";
        }
?>

<?php
        function updateName($type, $x, $nama) {
                if ($type == 'P') {
                        $query = "UPDATE `peserta` SET namaPeserta = '$nama' WHERE `peserta`.`idPeserta` = '$x'";
                }
                else if ($type == 'H') {
                        $query = "UPDATE `hakim` SET namaHakim = '$nama' WHERE `hakim`.`idHakim` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET namaAdmin = '$nama' WHERE `admin`.`idAdmin` = '$x'";
                }
                return $query;
        }

        function updatePass($type, $x, $pass) {
                if ($type == 'P') {
                        $query = "UPDATE `peserta` SET kataLaluanPeserta = '$pass' WHERE `peserta`.`idPeserta` = '$x'";
                }
                else if ($type == 'H') {
                        $query = "UPDATE `hakim` SET kataLaluanHakim = '$pass' WHERE `hakim`.`idHakim` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET kataLaluanAdmin = '$pass' WHERE `admin`.`idAdmin` = '$x'";
                }
                return $query;
        }
        
        function updateSex($type, $x, $sex) {
                if ($type == 'P') {
                        $query = "UPDATE `peserta` SET jantinaPeserta = '$sex' WHERE `peserta`.`idPeserta` = '$x'";
                }
                else if ($type == 'H') {
                        $query = "UPDATE `hakim` SET jantinaHakim = '$sex' WHERE `hakim`.`idHakim` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET jantinaAdmin = '$sex' WHERE `admin`.`idAdmin` = '$x'";
                }
                return $query;
        }

        function updateAge($type, $x, $age) {
                if ($type == 'P') {
                        $query = "UPDATE `peserta` SET umurPeserta = '$age' WHERE `peserta`.`idPeserta` = '$x'";
                }
                else if ($type == 'H') {
                        $query = "UPDATE `hakim` SET umurHakim = '$age' WHERE `hakim`.`idHakim` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET umurAdmin = '$age' WHERE `admin`.`idAdmin` = '$x'";
                }
                return $query;
        }
?>