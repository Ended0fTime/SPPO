<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/senarai.css'>
<head>
<body>
    <div id = 'main'>

        <div class = 'title'>
            <h2> &nbsp Sistem Pengurusan Pertandingan Origami </h2>
        </div>

        <div class = 'ui'>
            <?php include('../lib/navbar.php'); ?>
        </div>
            
        <div class = 'heading'>
            <h1 style="text-align:center"> Senarai Ahli </h1>
        </div>
        
        <div class = 'content'>

            <b><p style="text-align:center; font-size:3.3vh;"> Peserta </p></b>

            <input type="text" class = "searchBar" id="searchBarPeserta" onkeyup="searchPeserta()" placeholder="Cari...">

            <?php
                $sql = "SELECT * FROM peserta";
                $result= $con->query($sql); 

                echo "<form method = 'POST'><ul class = 'searchQ' id='searchQPeserta'>";

                for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<li><p>
                    ID: $row[idPeserta] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Nama: $row[namaPeserta] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Kata Laluan: $row[kataLaluanPeserta] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Jantina: $row[jantinaPeserta] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Umur: $row[umurPeserta] &nbsp &nbsp &nbsp &nbsp &nbsp
                    <p><button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$row[idPeserta]'>Kemaskini</button>
                    &nbsp | &nbsp 
                    <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$row[idPeserta]'>Padam</button></p>

                    </p></li>";
                }

                echo "</ul></form>";
            ?>

            <!-- Hakim Section --> <br><br><br>

            <b><p style="text-align:center; font-size:3.3vh;"> Hakim </p></b>

            <input type="text" class = "searchBar" id="searchBarHakim" onkeyup="searchHakim()" placeholder="Cari...">

            <?php
                $sql = "SELECT * FROM hakim";
                $result= $con->query($sql); 

                echo "<form method = 'POST'><ul class = 'searchQ' id='searchQHakim'>";

                for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<li><p>
                    ID: $row[idHakim] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Nama: $row[namaHakim] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Kata Laluan: $row[kataLaluanHakim] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Jantina: $row[jantinaHakim] &nbsp &nbsp &nbsp &nbsp &nbsp
                    Umur: $row[umurHakim] &nbsp &nbsp &nbsp &nbsp &nbsp
                    <p><button class ='editDelete' type='submit' formaction='../General/kemaskiniForm.php' name='id' value='$row[idHakim]'>Kemaskini</button>
                    &nbsp | &nbsp 
                    <button class ='editDelete' formaction='deleteCfm.php' name='id' value='$row[idHakim]'>Padam</button></p>

                    </p></li>";
                }

                echo "</ul></form>";
            ?>
        </div>
    </div>
</body>
    <script>
        function searchPeserta() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('searchBarPeserta');
            filter = input.value.toUpperCase();
            ul = document.getElementById("searchQPeserta");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("p")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                } else {
                li[i].style.display = "none";
                }
            }
        }
        function searchHakim() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('searchBarHakim');
            filter = input.value.toUpperCase();
            ul = document.getElementById("searchQHakim");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("p")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                } else {
                li[i].style.display = "none";
                }
            }
        }
    </script>
</html>