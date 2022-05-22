<?php 
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        die( header( 'location: logout.php' ) );
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['idPengguna'])) {
        function kickBack() {
            header('location:../login.php');
        }
        
        function validPeserta() {
            if ($_SESSION['userType'] != 'peserta') {
                header("location:../Admin/menuAdmin.php");
            }
        } 

        function validHakim() {
            if ($_SESSION['userType'] != 'hakim') {
                header("location:../Peserta/menuPeserta.php");
            }
        } 

        function validAdmin() {  
            if ($_SESSION['userType'] != 'admin') {
                header("location:../Hakim/menuHakim.php");
            }
        }  

        function validnotPeserta() {
            if ($_SESSION['userType'] == 'peserta') {
                header("location:../Peserta/menuPeserta.php");
            }
        } 
    }
    else {
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'><div></div>
            <script> alert('Sila login.'); window.location.href='../login.php' </script>";
    }
?>
