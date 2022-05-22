<?php
    include('../Sys/authCheck.php');
    validAdmin();

    $id = $_POST['id'];
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/menu.css'>
<head>
<body>
    <?php echo "
        <h2 style = 'margin-top:5vh; text-align:center;'> Padamkan maklumat $id? </h2>
        
        <form method = 'POST'>
            <p style = 'text-align:center;'>
                <button class = 'btn' formaction = '../Sys/padam.php' name = 'id' value = '$id'> Padam </button>
                &nbsp &nbsp &nbsp &nbsp
                <button class = 'btn' formaction = 'senarai.php'> Kembali </button></a>
            </p>
        </form>";
    ?>
</body>
</html>

<?php
    
?>