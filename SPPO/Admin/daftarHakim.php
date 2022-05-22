<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/form.css'>
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
            <h1> Daftar Hakim </h1>
        </div>
        
        <div class = 'content'>
            <div class = "frm" style="text-align:left;">  
                <form name = "f1" action = "../Sys/daftar.php" onsubmit = "return validation()" method = "POST" autocomplete="off"> 
                <p>  
                    <label> Nama Penuh: &nbsp &nbsp &nbsp </label>  
                    <input type = "text" id ="nama" name  = "nama" autofocus="autofocus" required
                    oninvalid="this.setCustomValidity('Isikan nama anda.')"
                    oninput="this.setCustomValidity('')" />  
                </p>  

                <p>  
                    <label> Kata Laluan: &nbsp &nbsp &nbsp &nbsp </label>  
                    <input type = "password" id ="pass" name  = "pass" required
                   oninvalid="this.setCustomValidity('Isikan kata laluan anda.')"
                   oninput="this.setCustomValidity('')" />
                </p>

                <p>  
                   <label> Pasti Kata Laluan: </label>  
                   <input type = "password" name  = "passcfm" required
                   oninvalid="this.setCustomValidity('Isikan kata laluan anda semula.')"
                    oninput="this.setCustomValidity('')" />
                </p>  

                <p>  
                    <label> Umur: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp </label>  
                    <input type = "number" id ="umur" name  = "umur" required
                    oninvalid="this.setCustomValidity('Isikan umur anda.')"
                    oninput="this.setCustomValidity('')" />  
                </p>

                <p id = "jantina"> Jantina: &nbsp &nbsp &nbsp &nbsp </p>           
                <p id = "btnBoy"><label> 
                    <input type = "radio" name = "jantina" value = 'lelaki' required
                    oninvalid="this.setCustomValidity('Pilih jantina anda.')"
                    oninput="this.setCustomValidity('')" /> Lelaki &nbsp </label></p>
                <label><p id = "btnGirl"> <input type = "radio" name = "jantina" value = 'perempuan'/> Perempuan </p></label>
                <br>

                <button id = 'btnkemaskini' style = 'margin-left:42%;' name ='btn' value = 'admin'> Daftar </button>

                </form>
                <?php $con=null; ?>
            </div>
        </div>
    </div>
    <script>  
        function validation() {  
            var ps=document.f1.pass.value;  
            var pscfm=document.f1.passcfm.value; 
            
            if(ps != pscfm) {  
                alert("Sila isikan kata laluan anda semula.");  
                return false;
            }
            else if (ps == pscfm) {
                return true;
            }     
        }                              
    </script>
</body>
</html> 