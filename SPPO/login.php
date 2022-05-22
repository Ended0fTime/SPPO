<!DOCTYPE html>
<html>  
<head>  
    <title>Sistem Login Sistem Pengurusan Pertandingan Origami</title>   
    <link rel = "stylesheet" type = "text/css" href = "Bling/login.css">   
</head>  
<body>  
    <div class = "frm">  
        <h1 style="text-align:center;">Sistem Pengurusan Pertandingan Origami</h1> 
        <form action = "Sys/loginAuth.php" method = "POST" autocomplete="off"> 

            <p style="text-align:center;">  
                <label>ID Anda: &nbsp&nbsp &nbsp </label>  
                <input type = "text" id ="user" name  = "user" onkeyup="this.value = this.value.toUpperCase();"
                autofocus="autofocus" placeholder= "ID" required
                oninvalid="this.setCustomValidity('Isikan ID anda.')"
                oninput="this.setCustomValidity('')"/>  
            </p>  

            <p style="text-align:center;">  
                <label>Kata Laluan:</label>  
                <input type = "password" id ="pass" name  = "pass" 
                placeholder= "Kata laluan" required
                oninvalid="this.setCustomValidity('Isikan kata laluan anda.')"
                oninput="this.setCustomValidity('')" />  
            </p>    
            
            <p id = "btnPeserta"><label><input type = "radio" name = "loginType" value = 'peserta' checked/> Peserta </label></p>
            <p id = "btnHakim"><label><input type = "radio" name = "loginType" value = 'hakim'/> Hakim </label></p>
            <p id = "btnAdmin"><label><input type = "radio" name = "loginType" value = 'admin' /> Admin </label></p>

            <p style="text-align:center;">     
                <input type = "submit" id = "btnlogin" name = 'btn' value = "Login" required = "required" />  
            </p>
            <p id = "btndaftar"><a href='daftarPeserta.php' style = "text-decoration: none;"> Daftar Sebagi Peserta </a></p>  
            
        </form>
        <?php $con=null; ?>
    </div>   
</body>     
</html>