<?php
    session_start();
    include('../Sys/authCheck.php');
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
            <h1 style="text-align:center"> Kemaskini Maklumat </h1>
        </div>
        
        <div class = 'content'>
            <div class = "frm" style="text-align:left;">  
                <form name = 'f1' action = '../Sys/kemaskini.php' onsubmit = 'return validation()' method = 'POST' autocomplete='off'>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "nama" placeholder= " "/>
                            <span class="input_label">Nama</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "pass" placeholder= " "/>
                            <span class="input_label">Kata Laluan</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "passcfm" placeholder= " "/>
                            <span class="input_label">Pasti Kata Laluan</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "number" name  = "umur" placeholder= " "/>
                            <span class="input_label">Umur</span>
                        </label>
                    </div>

                    <div class = "jantinaRadio">
                        <p id = "jantina"> Jantina: &nbsp &nbsp &nbsp &nbsp </p>           
                        <p id = "btnBoy"><label> 
                            <input type = "radio" name = "jantina" value = 'lelaki' /> Lelaki &nbsp 
                        </label></p>
                        <p id = "btnGirl"><label><input type = "radio" name = "jantina" value = 'perempuan'/> Perempuan </p></label>
                        <br>
                    </div>

                    <?php echo "<button id = 'btnkemaskini' type = 'submit' name = 'id' value = '$_POST[id]'> Kemaskini </button>"; ?>

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
                alert("Sila isikan kata laluan semula.");  
                return false;
            }
            else if (ps == pscfm) {
                return true;
            }     
        }                              
    </script>
    
</body>
</html> 