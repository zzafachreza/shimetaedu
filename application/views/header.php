<?php

// echo "<center><h1>APLIKASI SUDAH READY</h1></center>";
// echo "<center><h1>SILAHKAN HUBUNGI ADMIN ZAVALABS</h1></center>";
// die();

error_reporting(0);





?>

<!DOCTYPE html>
<html>
<head>
	<base href="">
	<meta charset="utf-8" />
	<title><?= $title; ?></title>
	<meta name="description" content="<?php echo $comp[0]->nama ?>">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- area css -->
    <link href="<?php echo site_url() ?>assets/css/pagePreloaders.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/selectize.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/app.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url() ?>assets/css/chart.css" rel="stylesheet" type="text/css" />  
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/css/app.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/css/calendar.css">
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    
      
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTTXRRAn+v3HzxGh4g9le4cDk5+G2gXr5p2ajA6F5eVb1cf1DD8z6z1OY9NSqHoU8zCc/gKtyA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">


    

      <script type="text/javascript" src="<?php echo site_url() ?>assets/js/jquery.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/dataTables.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/notify.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/pagePreloaders.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/popper.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/bootstrap.min.js"></script>


  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/selectize.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/bootstrap-datepicker.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/moment.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/chart.js"></script>

  <script type="text/javascript" src="<?php echo site_url() ?>assets/js/app.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script>
         $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
              items:1,
              loop:true,
              center:true,
              autoplay:true,
              stagePadding:-10,
            
          });
        });
     </script>
    <link rel="manifest" href="<?php echo site_url() ?>manifest.json">

    <!-- area icon -->

  <link rel="shortcut icon" href="<?php echo site_url() ?><?php echo $comp[0]->foto ?>" />
</head>

<div id="loader">
 <div class="lds-ripple"><div></div><div></div></div>
 
</div>

<div id="flash-message-error">
  test
</div>
<div id="flash-message-success">
  test
</div>

<style>

#loader{
  display: none;
  position: absolute;
  justify-content: center;
  align-items: center;
  align-content: center;
  z-index: 99;
  width: 100%;
  height: 100%;
  padding-left: 46%;
  padding-top: 20%;
  background-color:white;
  opacity: 0.9;
}

/*loader automatic*/
.lds-ripple,
.lds-ripple div {
  box-sizing: border-box;
}
.lds-ripple {
  display: inline-block;
  position: relative;
  width: 300px;
  height: 300px;
}
.lds-ripple div {
  position: absolute;
  border:7px solid <?php echo $comp[0]->warna_utama ?>;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 36px;
    left: 36px;
    width: 8px;
    height: 8px;
    opacity: 0;
  }
  4.9% {
    top: 36px;
    left: 36px;
    width: 8px;
    height: 8px;
    opacity: 0;
  }
  5% {
    top: 36px;
    left: 36px;
    width: 8px;
    height: 8px;
    opacity: 1;
  }
  100% {
    top: 0;
    left: 0;
    width: 80px;
    height: 80px;
    opacity: 0;
  }
}

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&family=Poppins:wght@300;400;600&display=swap');
  a,h1,h6,i,p, li, span{
     font-family: 'Poppins', sans-serif;
 }
 .form-eza:focus {
      outline: none; 
  	 color: #000;
     border-bottom:1px solid #D01818;
     
     
 }

 * {
  margin: 0px;
  padding: 0px;
 }
 

html, body {
  font-family: 'Poppins', sans-serif;
  display: flex;
  height: 100%;
  margin: 0;
  flex-direction: column;
    
 }
 
main {
    flex: 1 0 auto;
}

.footer {
  background-color: black;
  color: white;
  text-align: center;
  padding: 10px 0;
  margin-top: auto; /* Ensures the footer is always at the bottom of the content */
  position: relative;
  bottom: 0;
}

.form-eza {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color:<?php echo $comp[0]->warna_kedua ?>;
    background-clip: padding-box;
    border-bottom: 1px solid #000000;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}


 .bg-utama{
        background-color: white;
        color:#FFF;
        border-radius:5px;
        
    }
    
    .text-utama{
        color:<?php echo $comp[0]->warna_utama ?>;
    }
    .bg-utama:hover{
       box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
       color:#FFF;
    }
    
  .bg-kedua{
        background-color:<?php echo $comp[0]->warna_kedua ?>;
        color:#000;
        border-radius:5px;
 
    }
    
    .text-kedua{
        color:<?php echo $comp[0]->warna_kedua ?>;
    }
    .bg-kedua:hover{
       box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }
    
    
    
    .bg-ketiga{
        background-color:<?php echo $comp[0]->warna_ketiga ?>;
        color:#FFF;
        border-radius:0px;
 
    }
    
    .text-ketiga{
        color:<?php echo $comp[0]->warna_ketiga ?>;
    }
    .bg-ketiga:hover{
        color:white;
       box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }
    
    

    
    .nav-item{
        padding-left:0%;
        /*border:1px solid black;*/
        margin-bottom:0%;
        border-radius:2px;
        font-size:small;
    }



    nav {
    position: relative;
    z-index: 1;
    width: 100%;
    border-bottom: 1px solid black;
    background-color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px; /* Tambahkan padding */
    transition: height 0.3s ease;
    /* font-family: 'Poppins', sans-serif;
    font-weight: 300; */
}


/* Menambahkan margin-left ke ul.navbar-nav untuk memberikan jarak dengan logo */
.navbar-nav {
    margin-left: 20px; /* Atur jarak sesuai kebutuhan */
}
    
.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding: 0; /* Hilangkan padding karena padding ada di nav */
    transition: all 0.3s ease;
  

}

.nav-container.expanded {
    flex-direction: column;
    align-items: flex-start;
}


.logo-nav img {
    width: 150px; /* Sesuaikan ukuran logo */
    height: auto;
}
.hamburger-menu {
    display: none; /* Sembunyikan di desktop */
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}


    .logo-nav > img {
      width: 189px;
      height: 54px;
    }

  
   
    
    .menu-nav {
    display: flex;
    align-items: center;
    flex-grow: 1; /* Memungkinkan menu mengambil sisa ruang */
}

.menu-nav.active {
    display: flex;
    flex-direction: column;
}


    .menu-nav> li {
      position: relative;

    

    }

    .menu-nav a {
        text-decoration: none;
        color: black;
      font-size: 15px;

      
    }

  

    /* Style the dropdown container */
.dropdown {
    position: relative;
    display: inline-block;
   
}

/* Style the dropdown button */
.dropbtn {
 
    color: white;
    font-size: 16px;
    border: none;
    cursor: pointer;
   
}

/* Dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    list-style: none;
}


/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    transition: transform ease 0.5s;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: #f1f1f1;
    transform: scale(1.1);
    border-radius: 5px;
    border: 1px solid black;
    border-style: dashed;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
   
}

/* Style the dropdown button */
.dropbtn {
  
    color: white;
   
    font-size: 16px;
    border: none;
    cursor: pointer;
    text-decoration: none; /* Remove underline from a tag */
    list-style-type: none; /* Remove bullet points from li */
}



/* Links inside the dropdown */
.dropdown-content li a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

/* Change color of dropdown links on hover */
.dropdown-content li a:hover {
    background-color: #f1f1f1;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  
}

.list-menu {
  list-style: none;
    display: flex;


}

.list-menu > a {
 
}

.logout-nav {
  padding: 10px;
    display: flex;
    align-items: center;
    position: relative;
    gap: 10px; /* Menambahkan jarak antara teks dan tombol logout */
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-logout {
    position: relative;
    display: inline-block;
}

.dropbtn-logout {
    background-color: #f9f9f9;
    color: black;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown-content-logout {
    display: none;
    position: absolute;
    right: 0;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content-logout li a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content-logout li a:hover {
    background-color: #f1f1f1;
}

.dropdown-logout:hover .dropdown-content-logout {
    display: block;
}

.container-content {
   max-height: max-content;
   height: 100%;

}

/* Remove pseudo-element if it exists */
.nav-link.dropdown-toggle::after {
    content: none; /* Ensures no extra arrow is added */
}

/* Make navbar brand and welcome text flex items */
.navbar-brand-wrapper {
    display: flex;
    align-items: center;
}

/* Ensure the welcome text doesn't overflow and is appropriately sized */
.navbar-text.welcome-text {
    margin-left: 15px; /* Adds space between the logo and the welcome text */
    white-space: nowrap; /* Prevents the text from wrapping */
    font-size: 16px; /* Adjust font size as needed */
}


/* Responsive Design */
@media only screen and (max-width: 768px) {
    .menu-nav {
        display: none; /* Sembunyikan menu di mobile secara default */
        flex-direction: column;
        width: 100%;
        text-align: center;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: white;
        border-top: 1px solid #ccc;
    }

    .menu-nav.active {
        display: flex; /* Tampilkan menu ketika tombol hamburger diklik */
    }

    .hamburger-menu {
        display: block; /* Tampilkan hamburger menu di perangkat mobile */
    }

    .dropdown-content {
        position: relative;
        min-width: 100%;
        box-shadow: none;
        margin-top: 10px;
    }

    .dropdown-content a {
        padding: 12px 16px;
        font-size: 16px;
    }
    
    .dropdown-logout {
        position: relative;
    }

    .dropdown-content-logout {
        position: relative;
        min-width: 100%;
        box-shadow: none;
    }
    .navbar-brand-wrapper {
        display: block; /* Stack logo and welcome text on smaller screens */
        text-align: center; /* Center align text on smaller screens */
    }

    .navbar-text.welcome-text {
        margin-left: 0; /* Remove margin for centered text */
        margin-top: 5px; /* Add some margin-top for spacing */
    }

    .navbar-nav {
                margin-left: 0; /* Hilangkan margin di perangkat mobile */
            }

            .nav-list {
    gap: 54px;
 
}

.nav-logout  {
    margin-top: 20px;
}
  }

  @media only screen and (min-width: 769px) {
    .hamburger-menu {
        display: none; /* Sembunyikan tombol hamburger di layar yang lebih besar */
    }

    .menu-nav {
        display: flex; /* Tampilkan menu di layar yang lebih besar */
    }

    .nav-list {
    gap: 54px;
 
}


}

/* Custom CSS */
.navbar-brand img {
    width: 150px; /* Sesuaikan dengan ukuran logo Anda */
}

.navbar-nav .nav-link {
    font-size: 15px;
    font-weight: 600;
}

.navbar-text {
    margin-right: 15px;
}

/* Ensure the navbar stays on top of other elements */
.navbar.fixed-top {
    z-index: 1030; /* Bootstrap default is 1030, adjust if needed */
}

/* CSS tambahan untuk memperbaiki gaya dropdown */
.navbar-nav .dropdown-menu {
    right: 0;
    left: auto; /* Posisi dropdown muncul di bawah tombol */
}

.navbar-nav .nav-item .dropdown-toggle::after {
    margin-left: 5px; /* Spasi antara teks dan ikon dropdown */
}

.navbar-nav .nav-item .fa-caret-down {
    margin-left: 5px; /* Memberikan jarak antara teks dan ikon */
}


.navbar-nav .nav-link, 
.navbar-brand, 
.navbar-nav .dropdown-menu a {
    font-family: 'Poppins', sans-serif;
    font-weight: 500; /* Mengatur font-weight ke medium */
}

/* Menambahkan margin antara teks dan ikon dropdown */
.navbar-nav .nav-item .dropdown-toggle::after {
    margin-left: 5px;
}

.nav-list {
    gap: 20px;
 
}

</style> 


<?php

error_reporting(0);
    if(isset($_SESSION['username'])){

 
 $nav = explode("/", $_SERVER['REQUEST_URI']);

$menu = $nav[1];
$menu2 = $nav[2];



?>

<body  class="d-flex flex-column min-vh-100" style="font-family: 'PT Sans', sans-serif;">
  
<?php
  }


  function url_admin(){
    return 'http://localhost/adminshimeta/';
  }
  
  function Indonesia3Tgl($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal ="$tgl ".$namaBln[$bln]." $thn";
  return $tanggal;
}


function urladmin(){
    return 'https://adminmegadia.okeadmin.com/';
}


  function IDRtgl($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal =$tgl.'/'.$bln.'/'.$thn;
  return $tanggal;
}


function format_hari($waktu){
    
   $hari =  date('D', strtotime($waktu));
    
    
    switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
	
	return $hari_ini;
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('assets/images/logo.png') ?>" alt="logo" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav-list navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('home'); ?>">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Materi Saya
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo site_url('bahasajepang'); ?>">Bahasa Jepang</a>
                        <a class="dropdown-item" href="<?php echo site_url('bahasakorea'); ?>">Bahasa Korea</a>
                        <a class="dropdown-item" href="<?php echo site_url('bahasamandarin'); ?>">Bahasa Mandarin</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('informasi'); ?>">Informasi</a>
                </li>
            </ul>
            <ul class="nav-logout navbar-nav">
                <!-- Menambahkan ikon dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Selamat datang, <strong><?php echo $resultname[0]->username ?></strong> <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo site_url('home/logout'); ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<script>
function toggleMenu() {
    var navLinks = document.getElementById("navLinks");
    var navContainer = document.querySelector('.nav-container');

    if (navLinks.classList.contains("active")) {
        navLinks.classList.remove("active");
        navContainer.classList.remove("expanded");
    } else {
        navLinks.classList.add("active");
        navContainer.classList.add("expanded");
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var dropdown = document.querySelector('.dropdown');
    if (dropdown) {
        dropdown.addEventListener('click', function() {
            var dropdownContent = this.querySelector('.dropdown-content');
            dropdownContent.classList.toggle('show'); // Tampilkan atau sembunyikan dropdown
            event.stopPropagation(); // Hentikan event bubbling untuk mencegah penutupan dropdown
        });
    }
});
// Tambahkan event listener untuk menutup dropdown saat mengklik di luar
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn-logout')) {
        const dropdowns = document.getElementsByClassName("dropdown-content-logout");
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.style.display === 'block') {
                openDropdown.style.display = 'none';
            }
        }
    }
}
</script>

<main  class="flex-shrink-0">