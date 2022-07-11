<?php
// include mysql database configuration file
include_once '../Sys/connection.php';
 
if (isset($_POST['submit']))
{
 
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
             // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                // Get row data
                $id = $getData[0];
                $nama = $getData[1];
                $password = $getData[2];
                $jantina = $getData[3];
                $umur = $getData[4];
 
                // If user already exists in the database with the same email
                $query = "SELECT idPeserta FROM peserta WHERE idPeserta = '" . $getData[0] . "'";
 
                $check = mysqli_query($con, $query);
 
                if ($check->num_rows > 0)
                {
                    mysqli_query($con, "UPDATE peserta SET idPeserta = '" . $id . "', namaPeserta = '" . $nama . "', kataLaluanPeserta = '" . $password . "', jantinaPeserta = '" . $jantina . "', umurPeserta = '" . $umur . "' WHERE idPeserta = '" . $id . "'");
                }
                else
                {
                     mysqli_query($con, "INSERT INTO peserta (idPeserta, namaPeserta, kataLaluanPeserta, jantinaPeserta, umurPeserta) VALUES ('" . $id . "', '" . $nama . "', '" . $password . "', '" . $jantina . "', '" . $umur . "')");
 
                }
            }
 
            // Close opened CSV file
            fclose($csvFile);
 
            echo "<script>
                    alert('Import berjaya');
                    window.location.href = '../Admin/import.php';
                </script>";
         
    }
    else
    {
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/form.css'><div></div>
            <script>
                alert('Sila guna jenis fail yang betul');
                window.location.href = '../Admin/import.php';
            </script>";
    }
}