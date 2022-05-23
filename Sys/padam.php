<?php
    session_start();
    include('authCheck.php');
    include('connection.php');

    $id = $_POST['id'];

    if (substr_replace($id, '', 1, 1) == 'P') {
      $sql = "DELETE FROM peserta WHERE idPeserta='$id'";
      $con->query($sql);
    }
    if (substr_replace($id, '', 1, 1) == 'H') {
      $sql = "DELETE FROM Hakim WHERE idHakim='$id'";
      $con->query($sql);
    }

    echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/menu.css'>
          <div></div>
          <script>
            alert('Maklumat $id telah berjaya dipadamkan')
            window.location.href = '../Admin/senarai.php'
          </script>";
?>
