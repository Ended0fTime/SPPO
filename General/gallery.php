<?php
    session_start();
    include('../Sys/authCheck.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/gallery.css'>
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
            <h1 style="display:inline-block;"> Galeri </h1>  
        </div>

        <div class = 'content'>
            <p class = 'img'><img src="../Bling/Sauce/Art/dragonEgg.jpg" width='490' height='300'/>
            <br> "Dragon Egg" oleh Yuri Shumakov </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/eagle.jpg" width='270' height='320'/>
            <br> "3D Burung Helang" oleh Arthur </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/hatsuneMiku.jpg" width='300' height='430'/>
            <br> "Hastune Miku" oleh Itagaki Yuichi </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/owl.jpg" width='270' height='350'/>
            <br> "3D Burung Hantu" oleh Jenny W. Chan </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/swan1.jpg" width='270' height='360'/>
            <br> "3D Burung Angsa" oleh Nicholas Wong </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/gyarados.jpg" width='370' height='300'/>
            <br> "Gyarados" oleh Kakami Hitoshi </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/swan2.jpg" width='420' height='300'/>
            <br> "3D Angpao Swan" oleh Nathan </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/excalibur.jpg" width='300' height='430'/>
            <br> "Excalibur" oleh Nguyen Linh Son </p>
            
            <p class = 'img'><img src="../Bling/Sauce/Art/collection.jpg" width='320' height='400'/>
            <br> "Collection" oleh 6M 2017 </p>

            <p class = 'img'><img src="../Bling/Sauce/Art/walking_in_the_rain.jpg" width='300' height='450'/>
            <br> "Walking In The Rain" oleh Chen Xiao </p>
        </div>

    </div>
</body>
</html>