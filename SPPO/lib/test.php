<style>
.navMenu{overflow:hidden;background-color:#408080}
.navMenu a{float:left;display:block;color:#f2f2f2;text-align:center;padding:14px 16px;text-decoration:none;font-size:17px}
.navMenu a.active{background-color:#25a186;color:#FFF}
.navMenu .icon{display:none}
.fa-bars:before{content:"\f0c9"}
.navMenu .dropdown{float:left;overflow:hidden}
.navMenu .dropdown .dropbtn{
	font-size:16px;border:none;outline:none;color:#FFFFFF;padding:14px 16px;
	background-color:#408080;font-family:inherit;margin:0;width:100%;text-align:left}
.main_links{background-color:#408080;color:#FFFFFF;line-height:1}
.main_links:hover{background-color:#800000;color:#FFFFFF}
.navMenu .navbar a:hover,.navMenu .dropdown:hover .dropbtn{background-color:#800000;color:#FFFFFF}
.navMenu .dropdown-content{display:none;position:absolute;background-color:#000;min-width:160px;box-shadow:0 8px 16px 0 rgba(0,0,0,0.2);
	z-index:1}
.navMenu .dropdown-content a{float:none;color:#FFF;padding:12px 16px;text-decoration:none;display:block;text-align:left;
	background-color:#808040;color:#000000}.navMenu .dropdown-content a:hover{background-color:#333;color:#FFFFFF}
.navMenu .dropdown:hover .dropdown-content{display:block}

@media screen and (max-width: 768px){
	.navMenu a:not(:first-child){display:none}
	.navMenu .dropdown{display:none}
	.navMenu a.icon{float:right;display:block}
	.navMenu.mobileView{position:relative}
	.navMenu.mobileView .icon{position:absolute;right:0;top:0}
	.navMenu.mobileView a{float:none;display:block;text-align:left}
	.navMenu.mobileView .dropdown{float:none;display:block;text-align:left}
	.navMenu .dropdown-content{position:relative}
}
</style>
<script>
function openMenu() {  var navMain = document.getElementById('navMenuId');  if (navMain.className=== 'navMenu') {    navMain.className += ' mobileView';  } else {    navMain.className = 'navMenu';  }}
</script>
<div class='navMenu' id='navMenuId'>
	<a href='' class='main_links'>Home</a>
	<div class='dropdown'>
		<button class='dropbtn'>DropDown<i class='fa fa-caret-down'>&#9660;</i>
		</button>
		<div class='dropdown-content'><a href=''>child 1</a>
			<a href=''>child 1</a>
		</div>
	</div>
	<a class='icon' href='javascript:void(0);' onclick='openMenu()'>&#9776;</a>
</div>