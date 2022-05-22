<?php
    session_start();
    include('../Sys/authCheck.php');
    validnotPeserta();
    include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Sistem Pengurusan Pertandingan Origami</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../Bling/semakHakim.css'>
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
            <h1> Semak Karya </h1>
        </div>

        <div class = content>
            <form name = "f1" action = "../Sys/semak.php" method = "POST" autocomplete = "off">                 
                <div class = "frm">  

                    <p>  
                        <label> ID Peserta: </label>  
                        <?php
                            echo "<select id='idPeserta' name='idPeserta' style = 'text-align:center;'>";

                            $sql ="SELECT peserta.idPeserta FROM peserta 
                            WHERE NOT EXISTS (SELECT markah.idPeserta FROM markah WHERE peserta.idPeserta = markah.idPeserta)";
                            $result = $con->query($sql);
                            for($i=0; $i < mysqli_num_rows($result); $i++) {
                                $row = mysqli_fetch_assoc($result);
                                echo "<option value='$row[idPeserta]'>$row[idPeserta]</option>";
                            }

                            $sql = "SELECT idPeserta FROM markah";
                            $result = $con->query($sql);
                            for($i=0; $i < mysqli_num_rows($result); $i++) {
                                $row = mysqli_fetch_assoc($result);
                                echo "<option value='S$row[idPeserta]'>$row[idPeserta] (sudah disemak)</option>";
                            }
                            echo "</select>"; 
                        ?>
                    </p>  

                    <p>  
                        <label> Jumlah Langkah: </label>  
                        <input type = "number" name  = "langkah" min = '1' size = '6' required
                        oninvalid="this.setCustomValidity('Jumlah langkah mesti diisikan')"
                        oninput="this.setCustomValidity('')" />
                        </label>  
                    </p>

                    <p>  
                        <label> Markah Keaslian:  
                        <input type = "number" name  = "keaslian" min = '1' max = '100' size = '6' required
                        oninvalid="this.setCustomValidity('Markah keaslian mesti diisikan')"
                        oninput="this.setCustomValidity('')" />
                        /100
                        </label> 
                    </p>  

                    <p>  
                        <label> Markah Kelihatan:   
                        <input type = "number" name  = "kelihatan" min = '1' max = '100' size = '6' required
                        oninvalid="this.setCustomValidity('Markah kelihatan mesti diisikan')"
                        oninput="this.setCustomValidity('')" />  
                        /100
                        </label>
                    </p>

                    <p id = 'komen'>  
                        <label> Komen Hakim:
                        <textarea name="komen" rows="3" cols="25" maxlength = '100' required
                        oninvalid="this.setCustomValidity('Komen hakim mesti diberikan')"
                        oninput="this.setCustomValidity('')"></textarea>
                        </label>
                    </p>

                </div>
                
                <a href='semak.php'><button id = 'btnsemak' name ='btn' value = 'peserta'> Semak </button></a>   
            
            </form>
        </div>
        
        <?php $con=null; ?>
        
    </div>
</body>
</html>