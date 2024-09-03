<?php

$tipe = $_GET['tipe'];

$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->row_object();



?>

    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:30%" onClick="window.history.back()">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:70%">

                <p class="text-white"><strong><?php echo $tipe ?></strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
   <?php
	                foreach($this->db->query("SELECT * FROM data_artikel WHERE tipe='$tipe'")->result() as $r){
	                ?>
	             <div onclick="window.location.href='<?php echo site_url().'artikel/detail/'.$r->id_artikel ?>'" style="padding:20px;background-color:<?php echo $comp->warna_utama ?>;color:white;font-size:12pt;border-bottom:2px solid white">
	                <div class="row" >
	                    <div style="width:90%;display:flex;justify-content">
	                        <p><?php echo $r->judul ?></p>
	                    </div>
	                    <div style="width:10%">
	                        <i class="flaticon2-right-arrow"></i>
	                    </div>
	                </div>
	             </div>
	                <?php } ?>
</div>