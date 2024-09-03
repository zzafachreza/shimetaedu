<?php

$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->result();

$waktu = $this->uri->segment(3);
$tanggal = $this->uri->segment(4);

?>

    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp[0]->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:30%" onClick="window.history.back()">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:70%">

                <p class="text-white"><strong>Tambah Makan <?php echo $waktu ?></strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
   
  <center>
       <h3><?php echo Indonesia3Tgl($tanggal) ?></h3>
  </center>
    <form action="<?php echo site_url('nutrisi/insert') ?>" method="POST">
        <input type="hidden" name="fid_user" value="<?php echo $_SESSION['id'] ?>" />
        <input type="hidden" name="waktu" value="<?php echo $waktu ?>" />
        <input type="hidden" name="tanggal" value="<?php echo $tanggal ?>" />
        
        
        <table class="tabzaNutrisi table table-bordered" style="background-color:white">
            <thead>
                <th>Makanan</th>
            </thead>
            <tbody>
                  <?php
	                foreach($this->db->query("SELECT * FROM data_nutrisi")->result() as $r){
	                ?>
	                    <tr>
	                        <td style="width:100%">
	                             <label style="width:100%;margin-left:4%">
	                    
	                                <div class="row">
	                                <div style="width:90%">
	                                       <?php echo $r->makanan ?> <br/>( <small><?php echo $r->informasi ?></small> )
	                            
	                                </div>
	                                <div style="width:10%">
	                                    <input type="checkbox" name="fid_nutrisi[]" value="<?php echo $r->id_nutrisi ?>" />
	                                </div>
	                            </div>
	                
	                        </label>
	                        </td>
	                    </tr>
	                <?php } ?>
            </tbody>
        </table>
        
        
           <hr/>
           
           <button class="btn bg-utama col-sm-12" type="submit">Simpan</button>
    </form>
    
    
</div>
<script>
    $(".tabzaNutrisi").DataTable({
        paging:false
    });
</script>