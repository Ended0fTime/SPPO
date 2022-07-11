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
            <h1 style="text-align:center"> Import </h1>
        </div>
        
        <div class = 'content'>
            <div class="frm">
                <form action="../Sys/upload.php" method="post" enctype="multipart/form-data">
                    <input type = "file" id = "importBar" name="file">
                    <input type = "submit" name="submit" value="Import" id="btnImport">
                </form>
            </div>
        </div>
    </div>
   
</body>

<script>
    document.getElementById('importBar').onchange = function () {
        importBar.style.display = "";
    };
</script>

</html> 
