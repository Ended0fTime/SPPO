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
            <h1> Daftar Admin </h1>
        </div>
        
        <div class = 'content'>
            <div class = "frm">  
                <form name = "f1" action = "../Sys/daftar.php" onsubmit = "return validation()" method = "POST" autocomplete="off"> 
                
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" id ="nama" name  = "nama" 
                            autofocus="autofocus" placeholder= " " required
                            oninvalid="this.setCustomValidity('Isikan nama anda.')"
                            oninput="this.setCustomValidity('')" />   
                            <span class="input_label">Name Penuh</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "pass" 
                                placeholder= " " required
                                oninvalid="this.setCustomValidity('Isikan kata laluan anda.')"
                                oninput="this.setCustomValidity('')" />  
                            <span class="input_label">Kata Laluan</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "passcfm" placeholder= " " required
                                oninvalid="this.setCustomValidity('Isikan kata laluan anda semula.')"
                                oninput="this.setCustomValidity('')" />
                            <span class="input_label">Pasti Kata Laluan</span>
                        </label>
                    </div>


                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "number" id ="umur" name  = "umur" placeholder= " " required
                                oninvalid="this.setCustomValidity('Isikan umur anda.')"
                                oninput="this.setCustomValidity('')" />  
                            <span class="input_label">Umur</span>
                        </label>
                    </div>

                    <div class = "jantinaRadio">
                        <p id = "jantina" style="text-align: left;"> Jantina: </p>           
                        <p id = "btnBoy"><label>
                            <input type = "radio" name = "jantina" value = 'lelaki' required = 'required'
                            oninvalid="this.setCustomValidity('Pilih jantina anda.')"
                            oninput="this.setCustomValidity('')" /> Lelaki &nbsp </label>
                        </p>
                        <p id = "btnGirl"><label><input type = "radio" name = "jantina" value = 'perempuan' required = 'required'/> Perempuan </p></label>
                        <br>
                    </div>

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