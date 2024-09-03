<?php

$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->result();


?>

    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp[0]->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:40%" onClick="window.history.back()">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:60%">

                <p class="text-white"><strong>Bantuan</strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
    <p style="font--size:25pt;font-weight:bold;text-align:center;margin-top:40%">Perlu Bantuan atau Ada masalah pada Megadia? Silahkan Hubungi Whatsapp ini</p>

<center>
    <a href="https://wa.me/<?php echo $comp[0]->tlp ?>"><img src="<?php echo site_url('wa.png') ?>" width="50%" /></a>
</center>
</div>