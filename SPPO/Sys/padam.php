<?php
    //data check
    if (!isset($_POST['id'])) {
      echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'><div></div>
      <script> alert('Sila login.'); window.location.href='../login.php' </script>";
    }

    session_start();
    include('connection.php');

    $id = $_POST['id'];

    if ($_SESSION['idPengguna'] == $id ) {
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'>
          <div></div>
          <script>
            alert('Anda tidak boleh memadamkan diri.')
            window.location.href = '../Admin/senarai.php'
          </script>";
    }
    else {
      if (substr_replace($id, '', 1, 1) == 'P') {
        $sql = "DELETE FROM peserta WHERE idPeserta='$id'";
        $con->query($sql);
      }
      if (substr_replace($id, '', 1, 1) == 'H') {
        $sql = "DELETE FROM Hakim WHERE idHakim='$id'";
        $con->query($sql);
      }
      if (substr_replace($id, '', 1, 1) == 'A') {
        $sql = "DELETE FROM admin WHERE idAdmin='$id'";
        $con->query($sql);
      }
    }

    echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'>
          <div></div>
          <script>
            alert('Maklumat $id telah berjaya dipadamkan')
            window.location.href = '../Admin/senarai.php'
          </script>";
?>
