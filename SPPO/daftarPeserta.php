<!DOCTYPE html>
<html>  
<head>  
    <title>Sistem Daftar Sistem Pengurusan Pertandingan Origami</title>   
    <link rel = "stylesheet" type = "text/css" href = "Bling/daftarPeserta.css">   
</head>  
<body>  
    <div class = "frm">  
        <h1 style="text-align:center;">Menu Daftar Peserta</h1>
        <form name = "f1" action = "Sys/daftar.php" onsubmit = "return validation()" method = "POST" autocomplete="off"> 

            <p style="text-align:left;">  
                <label> Nama Penuh: &nbsp &nbsp &nbsp </label>  
                <input type = "text" id ="nama" name  = "nama" autofocus="autofocus" required
                oninvalid="this.setCustomValidity('Isikan nama anda.')"
                oninput="this.setCustomValidity('')" />  
            </p>  
            <p style="text-align:left;">  
                <label> Kata Laluan: &nbsp &nbsp &nbsp &nbsp </label>  
                <input type = "password" id ="pass" name  = "pass" required
                oninvalid="this.setCustomValidity('Isikan kata laluan anda.')"
                oninput="this.setCustomValidity('')" />
            </p>
                <p style="text-align:left;">  
                <label> Pasti Kata Laluan: </label>  
                <input type = "password" name  = "passcfm" required
                oninvalid="this.setCustomValidity('Isikan kata laluan anda semula.')"
                oninput="this.setCustomValidity('')" />
            </p>    
            <p style="text-align:left;">  
                <label> Umur: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp </label>  
                <input type = "number" id ="umur" name  = "umur" required
                oninvalid="this.setCustomValidity('Isikan umur anda.')"
                oninput="this.setCustomValidity('')" />  
            </p>

            <p id = "jantina" style="text-align: left;"> Jantina: &nbsp &nbsp &nbsp &nbsp </p>           
            <p id = "btnBoy"><label>
                <input type = "radio" name = "jantina" value = 'lelaki' required
                oninvalid="this.setCustomValidity('Pilih jantina anda.')"
                oninput="this.setCustomValidity('')" /> Lelaki &nbsp 
            </label></p>
            <p id = "btnGirl"><label><input type = "radio" name = "jantina" value = 'perempuan'/> Perempuan </p></label>
            <br>
            
            <button id = "btndaftar" name = 'btn' value = "peserta" >Daftar</button>   
        </form>
        <a href='login.php'><button id = 'btncancel' name ='btn'> Kembali </button></a>
        <?php $con=null; ?>
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