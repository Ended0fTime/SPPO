<style>
.navMenu{
    overflow:hidden;
    background-color:transparent;
}
.navMenu a{
    float:left;
    display:block;
    text-align:center;
    padding:14px 16px;
    text-decoration:none;
}
.navMenu .dropdown{
    float:left;
    overflow:hidden
}
/* main buttons*/
.main_links{
    background-color:transparent;
    color: black;
    font-size:2.7vh;
    line-height:1;
}
/* main buttons hover */
.main_links:hover{
    background-color:#f2c995;
    color: black;
    box-sizing: border-box;
    /* border: 1px solid black;  */
    border-top: 0px;
}
/* drop down button*/
.dropdown .dropbtn{
    background-color:transparent;
    color: black;
    font-size:2.7vh;
    border:none;
    outline:none;
    padding:11px 16px;
    font-family:inherit;
    width:100%;
    text-align:left
}
/* drop down button hover */
.navbar a:hover,.navMenu .dropdown:hover .dropbtn{
    background-color:#f2c995;
    color: black;
    box-sizing: border-box;
     /* border: 1px solid black;   */
    border-top: 0px;
}
.dropdown-content{
    display:none;
    position:absolute;
    min-width:160px;
    box-shadow:0 8px 16px 0 rgba(0,0,0,0.2);
    z-index:1;
}
/* drop down content */
.dropdown-content a{
    background-color:#e8d2ba;
    color:#404040;
    font-size:2.7vh;
    padding:12px 16px;
    text-decoration:none;
    display:block;
    text-align:left;
    float:none;
}
/* drop down content hover */
.dropdown-content a:hover{
    background-color:#f2c995;
    color:#404040;
    box-sizing: border-box;
    border: 1px solid #404040;
    margin-top: -1px; 
}
.dropdown:hover .dropdown-content{
    display:block
}
</style>



<div class='navMenu' id='navMenuId'>
    <?php
    if ($_SESSION['userType'] == 'peserta') {
        echo "<a href='../Peserta/menuPeserta.php' class='main_links'>Laman Utama</a>
              <div class='dropdown'>
                  <button class='dropbtn'>Layar<i class='fa fa-caret-down'>&#9660;</i></button>
                  <div class='dropdown-content'>
                      <a href='../General/info.php'>Maklumat Diri</a>
                      <a href='../Peserta/keputusanPeserta.php'>Keputusan Pertandingan</a>
                      <a href='../General/keputusan.php'>Keputusan Penuh</a>
                      <a href='../General/gallery.php'>Galeri</a>
                  </div>
              </div>";
    }
    else if ($_SESSION['userType'] == 'hakim') {
        echo "<a href='../Hakim/menuHakim.php' class='main_links'>Laman Utama</a>
              <div class='dropdown'>
                  <button class='dropbtn'>Layar<i class='fa fa-caret-down'>&#9660;</i></button>
                  <div class='dropdown-content'>
                      <a href='../General/info.php'>Maklumat Diri</a>
                      <a href='../Hakim/semakHakim.php'>Semak Karya</a>
                      <a href='../General/keputusan.php'>Keputusan Penuh</a>
                      <a href='../General/gallery.php'>Galeri</a>
                  </div>
              </div>";
    }

    else if ($_SESSION['userType'] == 'admin') {
        echo "<a href='../Admin/menuAdmin.php' class='main_links'>Laman Utama</a>
              <div class='dropdown'>
                  <button class='dropbtn'>Layar<i class='fa fa-caret-down'>&#9660;</i></button>
                  <div class='dropdown-content'>
                      <a href='../General/info.php'>Maklumat Diri</a>
                      <a href='../Hakim/semakHakim.php'>Semak Karya</a>
                      <a href='../Admin/daftarAhli.php'>Daftar Ahli</a>
                      <a href='../Admin/senarai.php'>Senarai Ahli</a>
                      <a href='../Admin/import.php'>Import</a>
                      <a href='../General/keputusan.php'>Keputusan Penuh</a>
                      <a href='../General/gallery.php'>Galeri</a>
                  </div>
              </div>";
    }
    ?>
        <a href='../Sys/logout.php' class='main_links'>Log Keluar</a>
</div>


