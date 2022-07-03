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

        <div class = "input_box">
            <label class="input">
                <input class ="input_field" type = "text" id ="user" name  = "user" 
                    onkeyup="this.value = this.value.toUpperCase();"
                    autofocus="autofocus" placeholder= " " required
                    oninvalid="this.setCustomValidity('Isikan ID anda.')"
                    oninput="this.setCustomValidity('')"/>
                <span class="input_label">ID Anda</span>
            </label> 
        </div>

        <div class = 'input_box'>
            <label class="input">
                <input class = "input_field" type = "password" id ="pass" name  = "pass" 
                    placeholder= " " required
                    oninvalid="this.setCustomValidity('Isikan kata laluan anda.')"
                    oninput="this.setCustomValidity('')" />  
                <span class="input_label">Kata Laluan</span>
            </label>
        </div>

        <div class = "userType">
            <p id = "btnPeserta"><label><input type = "radio" name = "loginType" value = 'peserta' checked/> Peserta </label></p>
            <p id = "btnHakim"><label><input type = "radio" name = "loginType" value = 'hakim'/> Hakim </label></p>
            <p id = "btnAdmin"><label><input type = "radio" name = "loginType" value = 'admin' /> Admin </label></p>
        </div>
            <p style="text-align:center;">     
                <input type = "submit" id = "btnlogin" name = 'btn' value = "Login" required = "required" />  
            </p>
            <p id = "btndaftar"><a href='daftarPeserta.php' style = "text-decoration: none;"> Daftar Sebagi Peserta </a></p>  
            
        </form>
        <?php $con=null; ?>
    </div>   
</body>     
</html>