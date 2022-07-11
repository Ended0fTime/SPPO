<?php
    include('connection.php');
    $id = $_POST['id'];

    $sql = "SELECT * FROM peserta WHERE idPeserta = '$id'";
    $result  = $con->query($sql);
    $row = mysqli_fetch_assoc($result);

    $sql2 = "SELECT idPeserta, FIND_IN_SET(jumlahMarkah, 
    (SELECT GROUP_CONCAT(jumlahMarkah ORDER BY jumlahMarkah DESC) FROM markah)) AS rank 
    FROM markah WHERE idPeserta = '$id'";
    $result2  = $con->query($sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $sql3 = "SELECT * FROM markah WHERE idPeserta = '$id'";
    $result3  = $con->query($sql3);
    $row3 = mysqli_fetch_assoc($result3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>System Pengurusan Pertandigan Origami</title>
</head>

<style>
    :root {
        background-image: url('../Bling/Sauce/wallpaperOrigami2_blur.jpg');
        background-attachment: fixed;
        background-size: cover;
        background-position: center; 
        background-repeat: no-repeat;

        text-align: center;
        font-size: 24px;
    }
    .title {
        font-size: 30px;
    }
</style>

<body>

    <div id = 'print'>
        <br><br><br><br>
        <?php
            echo "
            <h1 class = 'title'>Keputusan Pertandigan $row[namaPeserta]</h1> <br>
            <b>ID Peserta:</b> $row[idPeserta] <br><br>
            <b>Nama Peserta:</b> $row[namaPeserta] <br><br>
            <b>Tempat:</b> $row2[rank] <br><br>
            <b>Jumlah Markah:</b> $row3[jumlahMarkah] <br><br>
            <b>Markah Langkah:</b> $row3[langkah] <br><br>
            <b>Markah Kelihatan:</b> $row3[kelihatan] <br><br>
            <b>Markah Keaslian:</b> $row3[keaslian] <br><br>
            <b>Komen Hakim:</b> $row3[komenHakim] <br><br>
            ";
        ?>
    </div>

</body>
</html>

<script>
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();
        setTimeout(function () {
            window.location.href = '../Admin/senarai.php';	    
        }, 100);
</script>