<style>
.navMenu{
    overflow:hidden;
    background-color:transparent;
    z-index: 1;
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
    overflow:hidden;
}
.navMenu .icon{
    display:none;
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
    z-index:2;
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
    white-space:nowrap;
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

@media screen and (max-width: 1260px), screen and (max-height: 600px){
	.navMenu a:not(:last-child){
        display:none;
    }
    .navMenu .dropbtn {
        display:none;
    }
	.navMenu .dropdown{
        display:none;
    }

	.navMenu a.icon{
        float:right;
        display:block;
        color: black;
    }

	.navMenu.mobileView{
        position:relative;
    }
	.navMenu.mobileView .icon{
        position:absolute;
        right:0;
        top:0;
    }
	.navMenu.mobileView a:not(:last-child){
        float:none;
        display:block;
        text-align:left;
        width: 100%;
        background-color:#f0e3d7;
        line-height: 1.5rem;
    }
    .navMenu.mobileView a:hover:not(:last-child){
        background-color:#f2c995;
    }
	.navMenu.mobileView .dropdown{
        float:none;
        display:block;
        text-align:left;
    }

    .navMenu.mobileView .dropdown-content{
        display: block;
        position:relative;   
    }
	.navMenu.mobileView .dropdown-content a{
        background-color:#f0e3d7;
        position:relative;   
        width: 200%;
    }
    .navMenu.mobileView .dropdown-content a:hover{
        background-color:#f2c995;
        border: 0;
    }
}
</style>



<div class='navMenu' id='navMenuId'>
    <?php
    if ($_SESSION['userType'] == 'peserta') {
        echo "<a href='../Peserta/menuPeserta.php' class='main_links'>Laman Utama</a>
              <div class='dropdown'>
                  <button class='dropbtn'>Layar<i>&#9660;</i></button>
                  <div class='dropdown-content'>
                      <a href='../General/info.php'> - Maklumat Diri </a>
                      <a href='../Peserta/keputusanPeserta.php'> - Keputusan Pertandingan </a>
                      <a href='../General/keputusan.php'> - Keputusan Penuh </a>
                      <a href='../General/gallery.php'> - Galeri </a>
                  </div>
              </div>";
    }
    else if ($_SESSION['userType'] == 'hakim') {
        echo "<a href='../Hakim/menuHakim.php' class='main_links'>Laman Utama</a>
              <div class='dropdown'>
                  <button class='dropbtn'> Layar <i>&#9660;</i> </button>
                  <div class='dropdown-content'>
                      <a href='../General/info.php'> - Maklumat Diri </a>
                      <a href='../Hakim/semakHakim.php'> - Semak Karya </a>
                      <a href='../General/keputusan.php'> - Keputusan Penuh </a>
                      <a href='../General/gallery.php'> - Galeri </a>
                  </div>
              </div>";
    }

    else if ($_SESSION['userType'] == 'admin') {
        echo "<a href='../Admin/menuAdmin.php' class='main_links'>Laman Utama</a>
              <div class='dropdown'>
                  <button class='dropbtn'> Layar <i>&#9660;</i> </button>
                  <div class='dropdown-content'>
                      <a href='../General/info.php'> - Maklumat Diri </a>
                      <a href='../Hakim/semakHakim.php'> - Semak Karya </a>
                      <a href='../Admin/daftarAhli.php'> - Daftar Pengguna </a>
                      <a href='../Admin/senarai.php'> - Senarai Pengguna </a>
                      <a href='../Admin/import.php'> - Import Peserta </a>
                      <a href='../General/keputusan.php'> - Keputusan Penuh </a>
                      <a href='../General/gallery.php'> - Galeri </a>
                  </div>
              </div>";
    }
    ?>
    <a href='../Sys/logout.php' class='main_links'>Log Keluar</a>
    <a class='icon' id = 'icon' href='javascript:void(0);'>&#9776;</a>
</div>

<script>
icon.onmouseover = function openMenu() {  
    var navMain = document.getElementById('navMenuId');  
    navMain.className += ' mobileView';
    
    icon.onmouseout = function closeMenu() {
        navMain.className = 'navMenu';

        navMenuId.onmouseover = function keepMenuOpen() {
            navMain.className += ' mobileView';

            navMenuId.onmouseout = function keepMenuClose() {
                navMain.className = 'navMenu';
            }
        }
    }
}
</script>
