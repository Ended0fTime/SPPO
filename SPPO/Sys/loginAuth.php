<?php   
    if (isset($_POST['user'])) {
        include('connection.php');  
        $id = $_POST['user'];  
        $password = $_POST['pass'];  
        $loginType = $_POST['loginType']; 

            //to prevent from mysqli injection  
            $id = stripcslashes($id);  
            $password = stripcslashes($password);  
            $id = mysqli_real_escape_string($con, $id);  
            $password = mysqli_real_escape_string($con, $password); 
          
            if ($loginType == 'peserta') {
                $sql = "select *from peserta where idPeserta = '$id' and kataLaluanPeserta = '$password'";  
            }
            if ($loginType == 'hakim') {
                $sql = "select *from hakim where idHakim = '$id' and kataLaluanHakim = '$password'";   
            }
            if ($loginType == 'admin') {
                $sql = "select *from admin where idAdmin = '$id' and kataLaluanAdmin = '$password'";  
            }
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result); 

            if($count == 1){  
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'><div></div>
                      <script>alert('Login Berjaya.')</script>";
                session_start();
                $_SESSION['idPengguna'] = $id;
                $_SESSION['userType'] = $loginType;
                if ($loginType == 'peserta') {
                    echo "<script>window.location.href = '../Peserta/menuPeserta.php'</script>";
                }
                else if ($loginType == 'hakim') {
                    echo "<script>window.location.href = '../Hakim/menuHakim.php'</script>";
                }
                else if ($loginType == 'admin') {
                    echo "<script>window.location.href = '../Admin/menuAdmin.php'</script>";
                }
            }  
            else{  
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/login.css'>
                      <div></div>
                      <script>
                        alert('Login gagal. Sila pastikan ID dan kata laluan anda adalah betul.')
                        window.location.href = '../login.php'
                      </script>";
                
            }
    } 
    else {
        header('location:../login.php');
    }
    ?>  